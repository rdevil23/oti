<?php
session_start();
include "../../path.php";
include "../../app/database/db.php";
?>


<?php include("../../app/include/header-admin.php"); ?>


<table class="iksweb">
    <script>
        $('#js-sort').change(function(){
            $(this).closest('form').submit();
        });
    </script>
    <tbody>
    <tr>
        <th>№ дела</th>
        <th>ФИО</th>
        <th colspan="2">Рейтинг</th>
        <th>Телефон</th>
        <th>Эл. почта</th>
        <th>Специальность</th>
        <th>Согласие на зачисление</th>
        <th>Оригинал</th>
        <th>Редактировать</th>
        <th>Удалить</th>
        <th>tst</th>
    </tr>
    <?php foreach ($list as $row): ?>
        <tr>
            <td rowspan="4"><?php echo $row['case_number']; ?></td>
            <td rowspan="4"><?php echo $row['full_name']; ?></td>
            <td colspan="2" style="background: #494949; color: #ffffff">общий балл</td>
            <td rowspan="4"><?php echo $row['phone_number']; ?></td>
            <td rowspan="4"><?php echo $row['email']; ?></td>
            <td rowspan="4"><?php echo selectOne('university', 1, $params); ?></td>
            <td rowspan="4"><input type="checkbox"></td>
            <td rowspan="4"><input type="checkbox"></td>
            <td rowspan="4"><div class="red col-1"><a href="edit.php?id=--><?//=$post['id_entrant'];?><!--">редактировать</a></div></td>
            <td rowspan="4"><div class="del col-1"><a href="edit.php?delete_id=<?//=$post['id_entrant'];?>">удалить</a></div></td>
        </tr>
        <tr>
            <td colspan="2">150</td>
            <td>1</td>
        </tr>
        <tr>
            <td style="background: #494949; color: #ffffff">ЕГЭ</td>
            <td style="background: #494949; color: #ffffff">Инд. достиж.</td>
            <td>2</td>
        </tr>
        <tr>
            <td>50</td>
            <td>100</td>
            <td>3</td>
        </tr>
        <!--    <tr>-->
        <!--        <td rowspan="4"></td>-->
        <!--        <td rowspan="4"></td>-->
        <!--        <th colspan="2">общий балл</th>-->
        <!--        <td></td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <td colspan="2"></td>-->
        <!--        <td></td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <th>ЕГЭ</th>-->
        <!--        <th>Инд. достиж.</th>-->
        <!--        <td></td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <td></td>-->
        <!--        <td></td>-->
        <!--        <td></td>-->
        <!--    </tr>-->
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<!--            <th style="width: 90px">подробнее-->
<!---->
<!--                <button id="myBtn">Открыть</button>-->
<!--                <div id="myModal" class="modal">-->
<!--                    <div class="modal-content">-->
<!--                        <span class="close"></span>-->
<!--                                            ×-->
<!--                        <p>Возможно тут будут все данные об абитуриенте...</p>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--            </th>-->


<!--                <td><input type="checkbox">-->
<!---->
<!--                    <button id="myBtn">Открыть</button>-->
<!--                    <div id="myModal" class="modal">-->
<!--                        <div class="modal-content">-->
<!--                            <span class="close">×</span>-->
<!--                            <p>Возможно тут будут все данные об абитуриенте...</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </td>-->


<script>
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    // открыть модальное окно
    btn.onclick = function() {
        modal.style.display = "block";
    }
    // закрыть модальное окно при нажатии на х
    span.onclick = function() {
        modal.style.display = "none";
    }
    // при клике за пределами модального окна - оно закрывается
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script src="../../assets/js/jquery-3.4.1.min.js"></script>

</body>
</html>
