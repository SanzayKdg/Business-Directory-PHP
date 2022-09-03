<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hideBtn{
            display: none;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th class="thead">Sn.</th>
                <th class="thead">Name</th>
                <th class="thead">Age</th>
                <th class="thead">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $sno = 0;
            while($sno<5){
                $sno++;
            }
            echo '<tr>
                <td class="tbody">'.$sno.'</td>
                <td class="tbody">Ram</td>
                <td class="tbody">13</td>
                <td class="tbody">
                    <button type="submit" class="verify" id="verified">Verify</button>

                </td>
            </tr>
            <tr>
                <td class="tbody">'.$sno.'</td>
                <td class="tbody">Sam</td>
                <td class="tbody">18</td>
                <td class="tbody">
                    <button type="submit" class="verify" id="verified">Verify</button>

                </td>
            </tr>
            <tr>
                <td class="tbody">'.$sno.'</td>
                <td class="tbody">Nathnm</td>
                <td class="tbody">19</td>
                <td class="tbody">
                    <button type="submit" class="verify" id="verified">Verify</button>
                    <button type="submit" class="delete" id="delete">delete</button>
                </td>
            </tr>';
            ?>
        </tbody>
       
    </table>

    <script>
        verify =document.getElementsByClassName('verify');
        Array.from(verify).forEach((element)=>{
            element.addEventListener("click", (e)=>{
                console.log("verify is clicked");
                let sno = e.target.id.substr(1);
                if(confirm("Do you want to verify")){
                    alert("verified successfully")
                    element.classList.add("hideBtn");
                    window.location = `test.php?verify=${sno}`
                }else{
                    element.style.display = "inline";

                }
            })
        })
    </script>
</body>

</html>