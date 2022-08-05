<head>
<title>Add/remove multiple input fields dynamically with Jquery Laravel 5.8</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <link rel="stylesheet" type="text/css" href="./tailwind.css">
  <style type="text/css">
        input:checked ~ .dot {
          transform: translateX(100%);
          background-color: #48bb78;
        }
        input.custome-radio:checked ~ label span{
            border: none !important;
            font-weight: 700 !important;
        }
        /* input{
            font-size:10px!important;
        }
        label{
            font-size:15px!important;
        } */
    </style>

</head>
