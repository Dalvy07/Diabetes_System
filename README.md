# Project Setup Guide

## Project Description
This project is a Laravel-based web application running inside Docker containers. The environment includes PHP 8.2, MySQL 8.0, and Nginx.

## Prerequisites
Before setting up the project, ensure the following software is installed on your system:

1. **Docker** - [Install Docker](https://docs.docker.com/get-docker/)
2. **Docker Compose** - [Install Docker Compose](https://docs.docker.com/compose/install/)
3. **Git** - [Install Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)

## Installation Steps

### 1. Clone the Repository
```bash
git clone <repository-url>
cd <repository-folder>
```

### 2. Start Docker Containers
Run the following command to build and start the Docker containers:
```bash
docker-compose up -d --build
```

### 3. Access the Application
- Open your browser and navigate to [http://localhost:8080](http://localhost:8080) to access the application.

### 4. Manage Containers
To stop the containers:
```bash
docker-compose down
```

To rebuild the containers:
```bash
docker-compose up --build
```

## Project Structure

- **.git/** - Git version control folder
- **.idea/** - Project configuration files for IDE
- **nginx/** - Nginx configuration files
  - `default.conf` - Nginx server configuration
- **src/** - Application source code
- **docker-compose.yml** - Docker Compose configuration file
- **Dockerfile** - Dockerfile for building the PHP environment

## Docker Configuration Overview

### Docker Compose (`docker-compose.yml`)
- **Services:**
  - **app:** PHP 8.2 with Laravel
  - **db:** MySQL 8.0 database
  - **nginx:** Web server to serve the application

### Dockerfile
- Installs PHP dependencies and Composer
- Sets the working directory to `/var/www/html`

### Nginx Configuration (`nginx/default.conf`)
- Listens on port 80
- Routes requests to PHP-FPM through the `app` container

## Useful Commands

- Check running containers:
```bash
docker ps
```

- View logs:
```bash
docker-compose logs
```

- Enter the app container:
```bash
docker exec -it laravel_app bash
```

## Troubleshooting
- If you encounter permission issues, try running Docker commands with `sudo` or adjust Docker permissions.
- Ensure no other services are using ports 8000, 8080, or 3306.

---

Happy coding!

