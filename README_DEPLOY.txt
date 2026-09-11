DROP IN HUB — PAQUETE DE PRODUCCIÓN FINAL

MASTER VISUAL
Construido a partir de:
DropinHub_web_finalok.pdf

DOMINIO CONFIGURADO
https://www.dropin-hub.com/

MAIL DE CONTACTO CONFIGURADO
juani.giraldo@dropin-hub.com

TECNOLOGÍA
- HTML5 semántico
- CSS responsive
- JavaScript vanilla mínimo
- PHP para formulario
- Sin frameworks
- Sin librerías de animación
- Imágenes extraídas directamente del PDF
- WebP + JPG optimizado

ESTRUCTURA
/
├── index.html
├── .htaccess
├── 404.html
├── robots.txt
├── sitemap.xml
├── favicon.ico
├── favicon.png
├── api/
│   └── contact.php
└── assets/
    ├── css/styles.css
    ├── js/main.js
    └── img/

CÓMO SUBIR A GODADDY
1. Entrá al panel de hosting.
2. Abrí File Manager.
3. Entrá a public_html/ (o la carpeta raíz asignada a dropin-hub.com).
4. Subí TODO el contenido de este ZIP directamente ahí.
5. index.html debe quedar en la raíz pública.
6. Activá SSL.
7. Cuando HTTPS esté funcionando, descomentá en .htaccess las 2 líneas del redirect HTTPS.

FORMULARIO
El formulario envía a:
juani.giraldo@dropin-hub.com

Requiere PHP y mail() habilitado.
Si GoDaddy exige SMTP, el front-end ya queda listo y solo hay que reemplazar el contenido de api/contact.php por una implementación SMTP.

GITHUB
El paquete también está listo para versionado:
git init
git add .
git commit -m "Drop In Hub production"

No hay contraseñas, tokens ni credenciales dentro del proyecto.

SEO
Incluye:
- title y description
- canonical
- Open Graph
- Twitter Card
- og-cover
- robots.txt
- sitemap.xml

PERFORMANCE
- WebP
- JPG fallback
- lazy loading
- cache headers
- gzip/deflate
- hero con fetchpriority=high

QA ANTES DE PUBLICAR
- Chrome desktop
- Safari desktop
- Firefox
- iPhone Safari
- Android Chrome
- menú
- formulario
- SSL
- redirección www / no-www
- mobile 390px
- tablet 768px
- desktop 1440px
