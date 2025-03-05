<?php

namespace App\Command;

use App\Service\SendGridMailer;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Psr\Log\LoggerInterface;

#[AsCommand(
    name: 'app:test-sendgrid',
    description: 'Test SendGrid email sending',
)]
class TestSendGridCommand extends Command
{
    private $mailer;
    private $logger;

    public function __construct(SendGridMailer $mailer, LoggerInterface $logger = null)
    {
        parent::__construct();
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'The recipient email address')
            ->addOption('debug', 'd', InputArgument::OPTIONAL, 'Enable debug output', false)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $debug = $input->getOption('debug');

        $io->note(sprintf('Sending test email to: %s', $email));

        // Check if we can access environment variables
        $io->section('Environment Check');
        $apiKey = getenv('SENDGRID_API_KEY') ?: '(not set in environment)';
        $senderEmail = getenv('SENDGRID_SENDER_EMAIL') ?: '(not set in environment)';
        $senderName = getenv('SENDGRID_SENDER_NAME') ?: '(not set in environment)';
        
        if ($debug) {
            $io->table(['Variable', 'Value'], [
                ['SENDGRID_API_KEY', substr($apiKey, 0, 5) . '...' . substr($apiKey, -5)],
                ['SENDGRID_SENDER_EMAIL', $senderEmail],
                ['SENDGRID_SENDER_NAME', $senderName],
            ]);
        } else {
            $io->writeln('API Key exists: ' . (!empty($apiKey) && $apiKey !== '(not set in environment)' ? 'Yes' : 'No'));
            $io->writeln('Sender Email exists: ' . (!empty($senderEmail) && $senderEmail !== '(not set in environment)' ? 'Yes' : 'No'));
            $io->writeln('Sender Name exists: ' . (!empty($senderName) && $senderName !== '(not set in environment)' ? 'Yes' : 'No'));
        }

        $subject = 'Test Email from SendGrid';
        $htmlContent = '<h1>Hello from SendGrid!</h1><p>This is a test email from your Symfony application.</p>';
        $textContent = 'Hello from SendGrid! This is a test email from your Symfony application.';

        $result = $this->mailer->send($email, $subject, $htmlContent, $textContent);

        if ($result) {
            $io->success('Email sent successfully!');
            return Command::SUCCESS;
        } else {
            $io->error('Failed to send email.');
            $io->note('Please check app/var/log/dev.log for detailed error information.');
            return Command::FAILURE;
        }
    }
}