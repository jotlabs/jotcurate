<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta charset="utf-8">
    <title>JotCurate</title>
    {% block metadata %}{% endblock %}

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="/default.css">

    {% block extra_css %}{% endblock %}

</head>
<body>
    <header>
        <a href="/" class="site-name">JotCurate</a>        
    </header>

    {% block main %}{{ content }}{% endblock %}

    {% block sidebar %}{% endblock %}

    <footer>
       © 2013 a <a href="http://jotlabs.com/">JotLabs</a> production.
    </footer>

    <script type="text/javascript" src="/_assets/jquery-1.8.2.min.js"></script>
    {% block extra_javascript %}{% endblock %}

</body>
</html>
