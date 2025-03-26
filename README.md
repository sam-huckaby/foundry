# Foundry CMS

Foundry is a modern PHP Content Management System built with SQLite, designed to be lightweight, fast, and developer-friendly.

## Table of Contents
- [Requirements](#requirements)
- [Installation](#installation)
- [Quick Start](#quick-start)
- [Project Structure](#project-structure)
- [Development](#development)
- [Contributing](#contributing)

## Requirements

- PHP 8.1 or higher
- Composer
- SQLite3
- PHP SQLite extension enabled

## Installation

1. Create a new Foundry project using Composer:
```bash
composer create-project foundry/cms my-foundry-site
```

2. Navigate to your project directory:
```bash
cd my-foundry-site
```

3. The installation process will automatically create a `.env` file from `.env.example`. Make sure to review and update the environment variables as needed.

4. Start the development server:
```bash
composer dev
```

Your Foundry site should now be running at `http://localhost:8000`

## Quick Start

### Initial Setup

After installation, you'll need to:

1. Configure your database settings in `.env`
2. Run database migrations (if any):
```bash
php foundry migrate
```

### Common Commands

- Start development server: `composer dev`
- Create a new page: `php foundry make:page`
- Create a new template: `php foundry make:template`

> **Note:** Make sure you're running all commands from the root directory of your Foundry installation.

## Project Structure 
foundry/
├── app/ # Application core files
│ ├── Controllers/ # Request handlers
│ ├── Models/ # Database models
│ └── Views/ # Template files
├── public/ # Web server root directory
│ └── index.php # Application entry point
├── config/ # Configuration files
├── database/ # Database files and migrations
├── storage/ # File uploads and cache
├── tests/ # Test files
├── .env # Environment configuration
├── .env.example # Example environment configuration
└── composer.json # PHP dependencies and scripts

## Development

### Local Development Server

Start the local development server using:
```bash
composer dev
```

### Key Directories

- **app/**: Contains the core application code
- **public/**: The only directory that should be publicly accessible
- **storage/**: Must be writable by your web server
- **config/**: Contains all configuration files

### Common Gotchas

1. **Permissions**: Ensure the `storage/` directory is writable by your web server
2. **SQLite Database**: By default, the SQLite database file is stored in `database/`. Make sure this directory is writable
3. **Environment Variables**: Always check `.env` file exists and is properly configured
4. **URL Rewriting**: Ensure your web server is configured to handle URL rewriting for clean URLs

## Contributing

We welcome contributions to Foundry! Here's how you can help:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Development Setup for Contributors

1. Clone the repository:
```bash
git clone https://github.com/sam-huckaby/foundry.git
```

2. Install dependencies:
```bash
composer install
```

3. Copy `.env.example` to `.env`:
```bash
cp .env.example .env
```

4. Configure your local environment variables

### Coding Standards

- Follow PSR-12 coding standards
- Write tests for new features
- Document new features and changes
- Keep pull requests focused on a single feature or fix

## License

[Add your license information here]

## Support

For bugs and feature requests, please use the [GitHub Issues](https://github.com/sam-huckaby/foundry/issues) page.

---

Built with ♥ by the Foundry team

