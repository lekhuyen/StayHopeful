<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous">
    </script>
        <style>
        .logo-donate{
            background-color: transparent;
            width: 100%;
            height: 100%;
            text-align: center;
        }
        .logo-donate img{

            width: 350px;
            height: 100%;
        }
    </style>
    </head>
    <body>
        <div class="logo-donate">
            <img src="https://www.shutterstock.com/image-illustration/3d-image-thank-you-donating-260nw-1904263960.jpg" alt="Picture">
        </div>
        <div class="container" style="font-weight: bold;">
            
            <p>Dear {!! $fullname !!}</p>
            <p>I am writing to express my heartfelt gratitude for your generous
                support to our charitable project. Your contribution has played
                a crucial role in making a positive impact on the lives of those
                in need.</p>
            <p>Your kindness and generosity have not only provided financial
                assistance but have also inspired hope and brought smiles to the
                faces of many. With your support, we have been able to implement
                various initiatives aimed at addressing pressing social issues
                and improving the well-being of the less fortunate.</p>
            <p>We understand that there are numerous causes vying for your
                attention, and we truly appreciate your decision to stand with
                us in our mission. Your belief in the power of collective
                goodwill is a driving force behind our efforts, and we are
                committed to utilizing every resource responsibly to make a
                lasting difference.</p>
            <p>Once again, thank you for your unwavering support. Your
                compassion has become a beacon of hope for those facing
                adversity, and together, we are making strides towards creating
                a brighter and more compassionate world.</p>
            <p>With sincere gratitude,</p>
            <p>{!! $fullname !!}</p>
            <div style="line-height: 10px;">
                <p>Project: {!! $project !!}</p>
                <p>(84-028) 3910 7614</p>
                <p>contact@StayHopeful.org</p>
            </div>
        </div>

    </body>
</html>