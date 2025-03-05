<?php

namespace App\Command;

use App\Service\GmailMailer;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:test-gmail',
    description: 'Test the Gmail mailer service',
)]
class TestGmailCommand extends Command
{
    private $mailer;

    public function __construct(GmailMailer $mailer)
    {
        $this->mailer = $mailer;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email address to send the test to')
            ->addOption('name', null, InputOption::VALUE_OPTIONAL, 'Name of the recipient', null);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = $input->getArgument('email');
        $name = $input->getOption('name');
        
        $output->writeln('Sending test email to: ' . $email);
        if ($name) {
            $output->writeln('Recipient name: ' . $name);
        }

        // Display some debug info
        $debugInfo = $this->mailer->getDebugInfo();
        $output->writeln('Sender Email: ' . $debugInfo['sender_email']);
        $output->writeln('Sender Name: ' . $debugInfo['sender_name']);
        $output->writeln('Mailer Class: ' . $debugInfo['mailer_class']);
        
        // Don't try to access the environment key anymore
        $kernel = $this->getApplication()->getKernel();
        $output->writeln('Environment: ' . $kernel->getEnvironment());

        // Create test email
        $date = date('Y-m-d H:i:s');
        $subject = "Gmail Test Email - $date";
        
        // Fix: Use string concatenation instead of complex expressions inside heredoc
        $greeting = $name ? " $name" : "";
        
        $htmlContent = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { padding: 20px; max-width: 600px; margin: 0 auto; }
        .header { background-color: #4a90e2; color: white; padding: 10px 20px; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .footer { font-size: 12px; color: #777; margin-top: 20px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Test Email via Gmail SMTP</h1>
        </div>
        <div class="content">
            <p>Hello{$greeting},</p>
            <p>This is a test email sent from your Symfony application using Gmail SMTP.</p>
            <p>The current date and time is: <strong>{$date}</strong></p>
            <p>If you've received this email, your Gmail SMTP integration is working correctly!</p>
        </div>
        <div class="footer">
            <p>This is an automated test message. Please do not reply.</p>
        </div>
    </div>
</body>
</html>
HTML;

        // Create plain text version
        $textContent = "Hello" . $greeting . ",\n\n" .
            "This is a test email sent from your Symfony application using Gmail SMTP.\n" .
            "The current date and time is: " . $date . "\n\n" .
            "If you've received this email, your Gmail SMTP integration is working correctly!\n\n" .
            "This is an automated test message. Please do not reply.";

        $output->writeln('Sending email...');
        $result = $this->mailer->sendEmail(
            $email,
            $subject,
            $htmlContent,
            $textContent,
            $name
        );

        if ($result) {
            $output->writeln('<info>Email sent successfully!</info>');
            $output->writeln('Please check your inbox for the test email.');
            return Command::SUCCESS;
        } else {
            $output->writeln('<error>Failed to send email.</error>');
            $output->writeln('<error>Error: ' . $this->mailer->getLastError() . '</error>');
            return Command::FAILURE;
        }
    }
}