<?php

namespace App\Service;

class SimpleMailer
{
    private $apiKey;
    private $senderEmail;
    private $senderName;
    private $lastError;
    private $lastResponse;

    public function __construct(string $apiKey = null, string $senderEmail = null, string $senderName = null)
    {
        // Try to get values from environment if not provided
        $this->apiKey = $apiKey ?? $_SERVER['SENDGRID_API_KEY'] ?? null;
        $this->senderEmail = $senderEmail ?? $_SERVER['SENDGRID_SENDER_EMAIL'] ?? null;
        $this->senderName = $senderName ?? $_SERVER['SENDGRID_SENDER_NAME'] ?? null;
    }

    public function getLastError()
    {
        return $this->lastError;
    }

    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    public function getDebugInfo(): array
    {
        return [
            'api_key_exists' => !empty($this->apiKey),
            'api_key_prefix' => !empty($this->apiKey) ? substr($this->apiKey, 0, 5) . '...' : 'NOT SET',
            'sender_email' => $this->senderEmail ?? 'NOT SET',
            'sender_name' => $this->senderName ?? 'NOT SET',
        ];
    }

    public function sendEmail(string $to, string $subject, string $htmlContent, string $textContent = null): bool
    {
        if (empty($this->apiKey)) {
            $this->lastError = "SendGrid API key is not set";
            return false;
        }

        if (empty($this->senderEmail)) {
            $this->lastError = "Sender email is not set";
            return false;
        }

        $data = [
            'personalizations' => [
                [
                    'to' => [['email' => $to]]
                ]
            ],
            'from' => [
                'email' => $this->senderEmail,
                'name' => $this->senderName ?? $this->senderEmail
            ],
            'subject' => $subject,
            'content' => []
        ];

        // IMPORTANT: text/plain must come first, followed by text/html
        if ($textContent) {
            $data['content'][] = [
                'type' => 'text/plain',
                'value' => $textContent
            ];
        } else {
            // If no plain text is provided, create one from the HTML
            $data['content'][] = [
                'type' => 'text/plain',
                'value' => strip_tags($htmlContent)
            ];
        }

        // Now add the HTML content
        $data['content'][] = [
            'type' => 'text/html',
            'value' => $htmlContent
        ];

        return $this->makeRequest($data);
    }

    private function makeRequest(array $data): bool
    {
        $ch = curl_init('https://api.sendgrid.com/v3/mail/send');
        
        $headers = [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json'  // Fixed this line
        ];

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        // IMPORTANT: Skip SSL verification - only for development/testing
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        $this->lastResponse = [
            'status_code' => $statusCode,
            'body' => $response,
            'curl_error' => $error
        ];

        curl_close($ch);

        if ($error) {
            $this->lastError = "cURL Error: " . $error;
            return false;
        }

        if ($statusCode >= 200 && $statusCode < 300) {
            return true;
        } else {
            $this->lastError = "SendGrid API Error (HTTP $statusCode): $response";
            return false;
        }
    }
}