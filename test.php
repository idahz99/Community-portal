<!DOCTYPE htaml>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Simple Header - CodeWith Random</title>
    </head>
    <body>
        <header class="site-header">
            <div class="site-identity">
                <h1><a href="#">CodeWith Random</a></h1>
            </div>
            <nav class="site-navigation">
                <ul class="nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </header>
    </body>
</html>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans&display=swap");
body {
    font-family: "Open Sans", sans-serif;
    margin: 0;
}
a {
    text-decoration: none;
    color: #000;
}
a:hover {
    color: rgb(179, 179, 179);
}
.site-header {
    border-bottom: 1px solid #ccc;
    padding: 0.5em 1em;
    display: flex;
    justify-content: space-between;
}
.site-identity h1 {
    font-size: 1.5em;
    margin: 0.6em 0;
    display: inline-block;
}
.site-navigation ul,
.site-navigation li {
    margin: 0;
    padding: 0;
}
.site-navigation li {
    display: inline-block;
    margin: 1.4em 1em 1em 1em;
}
</style>