# DocuPro

![DocuPro Banner](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

Professional PDF generation tool built with Laravel. Create stunning, professional-grade PDFs with ease.

## ✨ Features

- **Lightning Fast**: Generate PDFs in milliseconds with optimized Laravel backend processing
- **Professional Design**: Beautiful templates and customizable layouts for any document type
- **Secure & Reliable**: Enterprise-grade security ensuring your documents stay private and safe
- **Customizable**: Flexible templating system for complete control over your PDFs

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.1
- Composer
- Laravel >= 10.x
- MySQL/PostgreSQL

### Installation

1. Clone the repository
```bash
git clone https://github.com/aquilaishola/docu-pro.git
cd docupro
```

2. Install dependencies
```bash
composer install
npm install
```

3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Set up your database in `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=docupro
DB_USERNAME=root
DB_PASSWORD=
```

5. Run migrations
```bash
php artisan migrate
```

6. Start the development server
```bash
php artisan serve
```

Visit `http://localhost:8000` to see DocuPro in action!
 
## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**Dev Aquila**

- GitHub: [@devaquila](https://github.com/devaquila)
- Website: [devaquila.com](https://devaquila.vercel.app)

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com)
- Icons by [Font Awesome](https://fontawesome.com)

## 📧 Support

For support, email aquila@giglyte.co or open an issue in the GitHub repository.

Built with ❤️ by Dev Aquila