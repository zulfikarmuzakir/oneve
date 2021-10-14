## How to install

- git clone https://gitlab.com/zulfikar26/online-event.git
- composer install
- copy .env.example to .env
- setting database on .env
- Add this to .env :

GOOGLE_CLIENT_ID=129143755678-q37tcrocauj1r4g4pc3d7lj6f65ttq0s.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=nQNguNyIeQyrZcVCcclof-SA
GOOGLE_CLIENT_REDIRECT=http://localhost:8000/auth/google/callback/

MIDTRANS_MERCHANT_ID=G254183279
MIDTRANS_CLIENT_KEY=SB-Mid-client-ibxEHSTD7QWRsVi7
MIDTRANS_SERVER_KEY=SB-Mid-server-rNT6E7vGugTxsBHdwPZSOmg0

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=146f1e33495668
MAIL_PASSWORD=e48dea113a7279
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=contact@oneve.com
MAIL_FROM_NAME="${APP_NAME}"

- php artisan key:generate
- php artisan migrate
- php artisan serve
- Login or Sign Up
- php artisan db:seed