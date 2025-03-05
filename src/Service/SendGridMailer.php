<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class SendGridMailer
{
    private $httpClient;
    private $params;
    private $logger;
    private $apiKey;
    private $senderEmail;
    private $senderName;

    public function __construct(
        HttpClientInterface $httpClient,
        ParameterBagInterface $params,
        LoggerInterface $logger = null
    ) {
        $this->httpClient = $httpClient;
        $this->params = $params;
        $this->logger = $logger;
        
        // Get configuration from parameters
        $this->apiKey = $this->params->get('app.sendgrid.api_key');
        $this->senderEmail = $this->params->get('app.sendgrid.sender_email');
        $this->senderName = $this->params->get('app.sendgrid.sender_name');
        
        // Add debug logging
        if ($this->logger) {
            $this->logger->debug('SendGridMailer initialized', [
                'sender_email' => $this->senderEmail,
                'sender_name' => $this->senderName,
                'api_key_exists' => !empty($this->apiKey)
            ]);
        }
    }

    public function send(
        string $toEmail,
        string $subject,
        string $htmlContent,
        string $textContent = null,
        string $toName = null
    ): bool {
        if ($this->logger) {
            $this->logger->info('Preparing to send email via SendGrid', [
                'to' => $toEmail,
                'subject' => $subject
            ]);
        }

        $payload = [
            'personalizations' => [
                [
                    'to' => [
                        [
                            'email' => $toEmail,
                            'name' => $toName ?? $toEmail
                        ]
                    ]
                ]
            ],
            'from' => [
                'email' => $this->senderEmail,
                'name' => $this->senderName
            ],
            'subject' => $subject,
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $htmlContent
                ]
            ]
        ];

        if ($textContent) {
            $payload['content'][] = [
                'type' => 'text/plain',
                'value' => $textContent
            ];
        }

        try {
            if ($this->logger) {
                $this->logger->debug('SendGrid API request payload', ['payload' => $payload]);
            }
            
            $response = $this->httpClient->request('POST', 'https://api.sendgrid.com/v3/mail/send', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json'
                ],
                'json' => $payload,
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getContent(false); // false to not throw an exception
            
            if ($this->logger) {
                $this->logger->info('SendGrid API response', [
                    'status_code' => $statusCode,
                    'response' => $content
                ]);
            }

            return $statusCode >= 200 && $statusCode < 300;
        } catch (\Exception $e) {
            if ($this->logger) {
                $this->logger->error('SendGrid API error', [
                    'error_class' => get_class($e),
                    'error' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'trace' => $e->getTraceAsString()
                ]);
            }
            return false;
        }
    }
}