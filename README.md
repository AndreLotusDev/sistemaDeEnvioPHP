# PHPMailSystem

This system simulates an email sending application.

It requires configuration during installation, including the insertion of an email and password to function properly.

To do this, go to `process_submit.php` and modify lines 71, 72, and 80 with the necessary details.

---

### Additional Information

#### Requirements
- PHP 7.4 or newer
- Composer for managing dependencies

#### Installation Guide
1. Clone the repository to your local machine or server.
2. Run `composer install` to install the required PHPMailer library.
3. Configure your SMTP details (host, username, password, port) in `process_submit.php`.
4. Ensure your server has SMTP access enabled.
5. Test the installation by sending a test email through the system.

#### Security Tips
- Never store plain text passwords in your scripts. Consider using environment variables or encrypted configuration files.
- Regularly update your dependencies to keep your system secure.
- Use CAPTCHA or other verification methods to prevent abuse of your email sending system.

#### Troubleshooting
- If emails are not being sent, check your SMTP settings and ensure your server is not blocking outgoing SMTP traffic.
- For issues related to PHPMailer, consult the [official PHPMailer GitHub repository](https://github.com/PHPMailer/PHPMailer) for documentation and support.

#### Contributing
Contributions to the project are welcome. Please fork the repository, make your changes, and submit a pull request for review.