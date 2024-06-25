# Springloaded Pair Project

Welcome to the Springloaded Pair Project!

## Overview

This is a straightforward project which involves a form submission on a single page. The tech stack is setup to mimic what we prefer to develop web applications with at Springloaded:

- Laravel
- Inertia
- React
- TailwindCSS

The goal of this project is to complete the integration between the frontend and the backend for the form submission. Here's the current state of the repo:

- There's a React form being rendered at the root URL: `/`
- The form doesn't do anything upon submission, no handlers have been setup
- There is no backend endpoint created yet

Expected outcome:

- Add a backend endpoint to process the form submission. This endpoint should send an email with the details from the payload.
- Wire up the existing React form to the new backend endpoint using Inertia's form helper

## Setup

- `cp .env.example .env`
- `composer install`
- `npm install`
- `php artisan key:generate`
- Serve the site however you normally serve your Laravel apps (Valet, Artisan Serve, etc)
