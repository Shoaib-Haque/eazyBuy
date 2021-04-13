<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="shortcut icon" href="{{asset('images/logo/eazyBuyLogo.ico')}}" type="image/png">
	<link rel="Stylesheet" href="{{asset('css/HomeStyle.css') }}" type="css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	@yield('header')
        <style>
        	#navBar {
            background-color: #232F3E;
            height: 100px;
            color: white;
        }
        .productName {
            margin-top: 20px;
            margin-left: 20px;
            height: 20px;
            width: 500px;
        }

        #nava {
            text-decoration: none;
            color: white;
            font-size: 25px;
            display: inline-block;
            padding: 10px;
        }

        #navBar {
            background-color: #232F3E;
            height: 100px;
            color: white;
        }
        .productName {
            margin-top: 20px;
            margin-left: 20px;
            height: 20px;
            width: 500px;
        }

        #department {
            font-size: 25px;
            padding: 10px;
            margin-left: 30px;
            font-weight: bold;
            display: inline-block;
            vertical-align: top;
            margin-top: 10px;
        }

        #nava {
            text-decoration: none;
            color: white;
            font-size: 25px;
            display: inline-block;
            padding: 10px;
        }

        .button {
            border: none;
            padding: 4px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            
            cursor: pointer;
        }
        .dropbtn {
            background-color: #232F3E;
            color: white;
            font-size: 25px;
            border: none;
        }

        .dropdown {
            font-size: 25px;
            padding: 10px;
            margin-top: 5px;
            margin-left: 30px;
            font-weight: bold;
            display: inline-block;
            vertical-align: top;
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

                .dropdown-content a:hover {
                    background-color: white;
                }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #232F3E;
        }
            .ui-autocomplete

        {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            display: none;
            min-width: 272px !important;
            padding: 0px 10px;
            margin: 0 0 10px 25px;
            list-style: none;
            background-color: #f5f8f9;
            font-family: 'Ubuntu', sans-serif;
            text-transform: initial !important;
            font-size: 14px;
        }

        .ui-menu-item {
            border-bottom: 1px solid #b4c4d4 !important;
            padding-bottom: 10px !important;
            padding-top: 10px !important;
        }

            .ui-menu-item > a.ui-corner-all {
                display: block;
                clear: both;
                font-weight: normal;
                line-height: 25px;
                color: #0a0a0a;
                white-space: nowrap;
                text-decoration: none;
                text-transform: lowercase !important;
            }

                .ui-menu-item > a.ui-corner-all:first-letter {
                    text-transform: uppercase;
                }

        .ui-state-hover, .ui-state-active {
            color: #ffffff;
            text-decoration: none;
            background-color: #0088cc;
            padding-left: 0px !important;
            padding-right: 0px !important;
            border-radius: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            background-image: none;
        }

        .ui-state-highlight a {
            font-weight: bold;
            color: #002e5b !important;
        }

        .ui-state-highlight {
            font-weight: bold;
            color: #002e5b !important;
        }

        .ui-helper-hidden-accessible {
            border: 0;
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .customerinput::-webkit-inner-spin-button,
        .customerinput::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#productName').autocomplete({
                source: '@Url.Action("SearchAuto", "Home")'
            });
        });
    </script>
</head>
<body>
    
    <div id="navBar">
    	<a id="nava" href="/home"><img id="homelinkimg" src="{{asset('images/logo/eazyBuyLogo.ico')}}" style="width="70" height="40""></a>
    	<input type="button" id="departmentButton" name="" value="All"><input type="text" name="productName" id="productName" class="productName"><button type="submit" id="hi" class="button"><img src="{{asset('images/logo/search-icon.png')}}" style="width="50" height="30""></button>

        <a id="nava" href="~/Home/Index"><font style="font-size: 15px">Hello, Sign in</font></a> |
        <a id="nava" href="~/CustomerLogin/Login">SignIn</a> |
        <a id="nava" href="~/Customer/Registration">SignUp</a> |
        <a id="nava" href="~/AdminLogin/Login">Admin</a>
    </div>

	@yield('index')
</body>
</html>