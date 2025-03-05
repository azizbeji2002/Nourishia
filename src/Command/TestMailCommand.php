<?php

namespace App\Command;

use App\Service\SimpleMailer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestMailCommand extends Command
{
    protected static $defaultName = 'app:mail-test';
    protected static $defaultDescription = 'Test the simple mailer service';

    private $mailer;

    public function __construct(SimpleMailer $mailer)
    {
        $this->mailer = $mailer;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email address to send the test to');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = $input->getArgument('email');
        $output->writeln('Sending test email to: ' . $email);

        // Display some debug info
        $debugInfo = $this->mailer->getDebugInfo();
        $output->writeln('API Key exists: ' . ($debugInfo['api_key_exists'] ? 'Yes' : 'No'));
        $output->writeln('API Key prefix: ' . $debugInfo['api_key_prefix']);
        $output->writeln('Sender Email: ' . $debugInfo['sender_email']);
        $output->writeln('Sender Name: ' . $debugInfo['sender_name']);

        $output->writeln('Sending email...');
        $result = $this->mailer->sendEmail(
            $email,
            'Test Email from Symfony',
            '<h1>Hello!</h1><p>This is a test email sent from your Symfony application.</p>',
            'Hello! This is a test email sent from your Symfony application.'
        );

        if ($result) {
            $output->writeln('<info>Email sent successfully!</info>');
            return Command::SUCCESS;
        } else {
            $output->writeln('<error>Failed to send email.</error>');
            $output->writeln('<error>Error: ' . $this->mailer->getLastError() . '</error>');
            
            $response = $this->mailer->getLastResponse();
            if ($response) {
                $output->writeln('Status Code: ' . $response['status_code']);
                $output->writeln('Response: ' . $response['body']);
                if (!empty($response['curl_error'])) {
                    $output->writeln('cURL Error: ' . $response['curl_error']);
                }
            }
            
            return Command::FAILURE;
        }
    }
}