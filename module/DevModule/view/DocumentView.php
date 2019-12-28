<!DOCTYPE html>
<html>
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/LightCSS.css">

    <style>
        body{
            display: flex;
            background-color: #ffffff;
            font-family: monospace;
        }
        .left-bar{
            width: 5vw;
            min-height: 100vh;
        }
        .components{
            width: 70vw;
            height: max-content;
            margin: 10px 5px 0 0;
        }
        .components .component{
            margin-bottom: 50px;
        }
        .components .component .code-example{
            margin: 10px;
            background-color: #eff0f1;
            padding: 10px;
            padding-left: 13px;
            border-radius: 10px;
            white-space: pre-wrap;
            word-break: break-all;
        }
        .components .component .describe{
            margin: 10px;
            white-space: pre-wrap;
            word-break: break-all;
        }
        .components .component p{
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="left-bar ground-gray"></div>

    <div class="components">
        <p class="text-center text-size-30 text-bold text-gray">API List</p>
        <?php
            foreach ($model as $item) 
            {
                echo '<div class="component">';
                echo '<p class="ground-gray text-white text-size-14">> ' . $item['title'] . '</p>';
                echo '<p>Method: ' . $item['method'] . '</p>';
                echo '<p>Endpoint: ' . $item['endpoint'] . '</p>';
                if(!isEmpty($item['input']))
                {
                    echo '<p class="text-size-11">INPUT:</p>';
                    echo '<pre class="code-example text-size-09">' . $item['input'] . '</pre>';
                }
                if(!isEmpty($item['success']))
                {
                    echo '<p class="text-size-11">SUCCESS:</p>';
                    echo '<pre class="code-example text-size-09">' . $item['success'] . '</pre>';
                }
                if(!isEmpty($item['fail']))
                {
                    echo '<p class="text-size-11">FAILURE:</p>';
                    echo '<pre class="code-example text-size-09">' . $item['fail'] . '</pre>';
                }
                if(!isEmpty($item['describe'])){
                    echo '<p class="text-size-11">DESCRIBE:</p>';
                    echo '<pre class="describe text-size-09">' . $item['describe'] . '</pre>';
                }
                echo '</div>';
            }
        ?>
    </div>
</body>

