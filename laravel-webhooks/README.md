# Laravel webhooks

Docker, Laravel, Upsource webhooks and Slack integration. Every event's webhook pushes notification to Slack channel through Laravel.

## Installation

1. Install Docker, docker-compose.
2. Clone the **showcase** repository to a folder.
3. Go to laravel-webhooks directory.
4. Copy .env.example to .env.
5. Execute `docker-compose up -d` in the folder.
6. Execute `docker-compose exec app php artisan key:generate`.
7. Execute `docker-compose exec app php artisan config:cache`.
8. Go to **http://localhost:8081** and tune up Upsource: create a project, enable Webhooks and set up webhook url: http://nginx:8080/api/webhook.
9. Voilà!

## Explanation

To catch webhook from Upsource we use route **/api/webhook**. 
After we get incoming request, we fire up event **WebhookEvent** in WebhookController, which is a part of notification system.
The event's listener builds up notification message and send it to a Slack channel.