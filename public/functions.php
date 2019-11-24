<?php
// PHP-ReRoute information.
function phprer() {
    return "<html>
            <head>
              <title>PHP-ReRoute - Data</title>
              <meta name=\"theme-color\" content=\"#0a64be\" />
              <meta name=\"viewport\" content=\"width=device-width, initial-scale=0.5\">
              <style>
              body {
                background-image: linear-gradient(#161616,#222222,#282828);
                text-shadow: 0px 0px 2px lightblue;
                padding: 0px;
                margin: 6px;
              }
              table, th, td {
                border: 3px solid #eeeeee;
                font-family: 'Arial', sans-serif;
                font-size: 24px;
                color: #fefefe;
                border-collapse: collapse;
                width: 100%;
                padding: 12px;
              }
              th, td {
                border: 2px solid #eeeeee;
              }
              th {
                background-image: linear-gradient(#044a8f,#020099);
                text-decoration: bold;
              }
              td {
                background-image: linear-gradient(#1b75cf,#0a54ae);
              }
              .name {
                width: 20%;
                text-align: center;
              }
              .desc {
                width: 60%;
              }
              .ver {
                width: 20%;
                text-align: center;
              }
              </style>
            </head>
            <body>
              <table>
                <tr>
                  <th class=\"name\">Name</th>
                  <th class=\"desc\">Description</th>
                  <th class=\"ver\">Version</th>
                </tr>
                <tr>
                  <td class=\"name\">PHP-ReRoute</td>
                  <td class=\"desc\">The router library itself for PHP (supported version 7.1.0 or higher).</td>
                  <td class=\"ver\">1.0.0-dev</td>
                </tr>
                <tr>
                  <td class=\"name\">Router</td>
                  <td class=\"desc\">The Router class for serving content and controlling the server-side type of data such as HTTP status, rendering the page.</td>
                  <td class=\"ver\">1.0 (23/11/19)</td>
                </tr>
                <tr>
                  <td class=\"name\">Template</td>
                  <td class=\"desc\">The Template class for serving content through template files. Used internally to make use of templates.</td>
                  <td class=\"ver\">1.0 (23/11/19)</td>
                </tr>
                <tr>
                  <td class=\"name\">View</td>
                  <td class=\"desc\">The View class for rendering contents of files or websites easily. Renders a files content or a website.</td>
                  <td class=\"ver\">1.0 (23/11/19)</td>
                </tr>
                <tr>
                  <td colspan=\"3\"><i>Ongoing development of PHP-ReRoute by Rageous0.</i></td>
                </tr>
              </table>
            </body>
          </html>";
}
?>