<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body>

<div class="container" id="app">
    <div class="row">
        <div class="col-12">
            <h2 class="text-primary">Testing</h2>
            <list></list>
        </div>
    </div>
</div>

<script src="{{ asset("js/app.js") }}"></script>
</body>
</html>
<script>
    import List from "../js/components/List";
    export default {
        components: {List}
    }
</script>
