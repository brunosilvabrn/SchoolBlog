# Blog 
Blog para escola desenvolvido em php.

![Screenshot Projeto](public\uploads\blog.gif)
## 🚀 Começando

Essas instruções permitirão que você consiga rodar o projeto na sua máquina ou num servidor web.

Consulte **Instalação** para saber como implantar o projeto.

### 📋 Pré-requisitos

Ter um servidor **PHP** (apache) instalado Xampp ou Wampserver no **Windows** ou Lamp no **Linux** com **PHP** 7.3.2 ou superior e um banco de dados **Mysql**.

```
Servidor Local 
Windows: Xampp ou Wampserver.
Linux: Lamp.
```

### 🔧 Instalação (local)

Importar as tabelas do banco de dados **blog_teste.sql** para o Mysql.

Defina as credenciais de acesso ao banco de dados.
<br>
No arquivo app/**connection.php**

```
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DBNAME', 'blog_teste');
```

Altere a base **app/base.php** para a url onde seu projeto está instalado.

```
    <base href="http://localhost/SchoolBlog/">

```

Usuário e senha para login. url para acessar administrador -> **blog/administrador**<br>
Usuário: **teste** <br>
Senha: **123456**

## 📦 Desenvolvimento

Sistema desenvolvido com PHP e Mysql.

- HTML5
- CSS3
- PHP 7
- BOOTSTRAP

---

⌨️ Feito por [Bruno Lopes Silva](https://github.com/brunosilvabrn) 
