<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shangel by JL Smart Solutions</title>

    {!! Html::style('/assets/css/style.css') !!}
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:300,700' rel='stylesheet' type='text/css'>


    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="notifications"></div>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/ordenes') }}">shangelperu.com.pe</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                {{-- {!! Html::menu(config('courier.menu')) !!} --}}

                  {{-- @include('layout/login') --}}
                    
                </div>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script>
    
    /** https://github.com/ReallyGood/jQuery.duplicate */
$.duplicate = function(){
  var body = $('body');
  body.off('duplicate');
  var templates = {};
  var settings = {};
  var init = function(){
    $('[data-duplicate]').each(function(){
      var name = $(this).data('duplicate');
      var template = $('<div>').html( $(this).clone(true) ).html();
      var options = {};
      var min = +$(this).data('duplicate-min');
      options.minimum = isNaN(min) ? 1 : min;
      options.maximum = +$(this).data('duplicate-max') || Infinity;
      options.parent = $(this).parent();

      settings[name] = options;
      templates[name] = template;
    });
    
    body.on('click.duplicate', '[data-duplicate-add]', add);
    body.on('click.duplicate', '[data-duplicate-remove]', remove);
  };
  
  function add(){
    var targetName = $(this).data('duplicate-add');
    var selector = $('[data-duplicate=' + targetName + ']');
    var target = $(selector).last();
    if(!target.length) target = $(settings[targetName].parent);
    var newElement = $(templates[targetName]).clone(true);
    
    if($(selector).length >= settings[targetName].maximum) {
      $(this).trigger('duplicate.error');
      return;
    }
    target.after(newElement);
    $(this).trigger('duplicate.add');
  }
  
  function remove(){
    var targetName = $(this).data('duplicate-remove');
    var selector = '[data-duplicate=' + targetName + ']';
    var target = $(this).closest(selector);
    if(!target.length) target = $(this).siblings(selector).eq(0);
    if(!target.length) target = $(selector).last();
    
    if($(selector).length <= settings[targetName].minimum) {
      $(this).trigger('duplicate.error');
      return;
    }
    target.remove();
    $(this).trigger('duplicate.remove');
  }
  
  $(init);
};

$.duplicate();
    
    </script>

    </body>
</html>
