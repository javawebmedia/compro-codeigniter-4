# Company Profile Website Full Features with CodeIgniter 4 Framework
Anda dapat membaca pandunan penggunaan website melalui link berikut ini https://javawebmedia.com/blog/download-source-code-website-company-profile-full-features-dengan-codeigniter-4/. Adapun demo dapat Anda akses di http://compro-ci4.javawebmedia.co.id/.

Semoga bermanfaat.
Spesifikasi Teknis Source Code
Website ini dikembangkan dengan beberapa spesifikasi:
1. Dikembangan dengan Codeigniter 4. Pastikan teman-teman membaca Server Requirements dari CI4 ini yah.
2. Template Admin menggunakan AdminLTE 3.1.0. Bisa diakses di https://adminlte.io/
3. Template front end menggunakan Medicio 4.0 dari https://bootstrapmade.com/medicio-free-bootstrap-theme/.
4. Notifikasi menggunakan Sweetalert

# Fitur-fitur Website meliputi:

## HALAMAN FRONT END:

1. Halaman Beranda/Homepage
2. Banner slider
3. Halaman berita dan detailnya
4. Halaman layanan
5. Halaman profile
6. Halaman staff dan team
7. Halaman galeri gambar
8. Halaman galeri video
9. Halaman client
10. Halaman file download
11. Halaman kontak

## HALAMAN BACK END:
1. Login dan logout
2. Halaman update profile dan ganti password
3. Halaman Dashboard
4. Halaman kelola berita dan kategorinya
5. Halaman kelola layanan dan profil
6. Halaman kelola staff and team
7. Halaman kelola client
8. Halaman kelola galeri gambar dan kategorinya
9. Halaman kelola upload/download file dan kategorinya
10. Halaman kelola video youtube
11. Halaman kelola pengguna
12. Halaman kelola konfigurasi website, logo dan icon
13. Halaman panduan website
14. Dan fitur lainnya

## Mengakses Halaman Website dan Login ke Admin
1. Buka browser Anda
2. Ketik alamat http://websitekamu.com
3. Untuk Login ke halaman Back End, silakan buka http://websitekamu.com/login
4. Username: javawebmedia
5. Password: javawebmedia

# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds the distributable version of the framework,
including the user guide. It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).


## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/contributing.md) section in the development repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
