<?php
    include "../../path.php";
    include "../../app/controllers/entrant.php";
    include_once "../../app/database/db.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="../../image/favicon-16x16.png">
    <title>Добавить абитуриента</title>
</head>
<body>

<?php include("../../app/include/header-create.php"); ?>
<main>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form action="create.php" method="post">

                <div class="row">
                    <div class="col-20">
                        <h3>Персональные данные <div class="err"><p style="color: red"><?=$errMsg?></p></div></h3>
                        <label for="full_name"><i class="fa fa-user"></i> ФИО</label>
                        <input type="text" id="full_name" name="full_name" value="<?=$full_name;?>" placeholder="Полное имя">
                        <div class="row">
                            <div class="col-50">
                                <label for="sex">Пол</label>
                                <input type="text" id="sex" name="sex" value="<?=$sex;?>" placeholder="муж./жен.">
                            </div>
                            <div class="col-50">
                                <label for="birthday">Дата рождения</label>
                                <input type="text" id="birthday" name="birthday" value="<?=$birthday;?>" class="mask-date form-control" placeholder="год-месяц-день">
                            </div>
                        </div>
                        <label for="phone"><i class="fa fa-phone"></i> Номер телефона</label>
                        <input type="text" id="phone_number" name="phone_number" value="<?=$phone_number;?>" class="mask-phone form-control" placeholder="Введите номер в формате +7 (999) 999-99-99">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" value="<?=$email;?>" placeholder="Электронная почта">
                        <label for="address">Адрес</label>
                        <input type="text" id="address" name="address" value="<?=$address;?>" placeholder="Улица/дом/кв.">
                        <label for="region_city">Город</label>
                        <input type="text" id="region_city_name" name="region_city" value="<?=$region_city;?>" placeholder="Регион/город">
                        <div class="row">
                            <div class="col-5">
                                <label for="case_number">Номер дела</label>
                                <input style="width: 260px" type="text" id="case_number" name="case_number" value="<?=$case_number;?>" placeholder="Введите номер в формате: 123456">
                            </div>
                        </div>
                        <h3>Дополнительная информация</h3>
                        <label>
                            <input name="extra" value="0" type="hidden">
                            Инвалид/сирота/ветеран:<input type="checkbox" id="extra" class="checkbox_style" value="1" name="extra"">
                        </label>
                        <label for="education_number"></label>
                        <select id="education_number" name="education_number">
                            <option value="Первое высшее образование">Первое высшее образование</option>
                            <option value="Второе высшее образование">Второе высшее образование</option>
                        </select>
                    </div>
                    <hr>

                    <div class="col-25">
                        <h3>Экзамены</h3>
                        <label for="exam">Экзамен №1</label>
                        <input type="text" id="subject_name" name="subject1" placeholder="Название предмета">
                        <div class="row">
                            <div class="col-50">
                                <label for="type">Тип экзамена</label>
                                <input type="text" id="type_name" name="type1" placeholder="ЕГЭ/внутренний">
                            </div>
                            <div class="col-25">
                                <label for="year">Год сдачи</label>
                                <input type="text" id="year" name="year1" placeholder="20xx">
                            </div>
                            <div class="col-25">
                                <label for="mark">Оценка</label>
                                <input type="text" id="mark" name="mark1" placeholder="Баллы">
                            </div>
                        </div>
                        <hr><br>

                        <label for="exam">Экзамен №2</label>
                        <input type="text" id="subject_name" name="subject1" placeholder="Название предмета">
                        <div class="row">
                            <div class="col-50">
                                <label for="type">Тип экзамена</label>
                                <input type="text" id="type_name" name="type2" placeholder="ЕГЭ/внутренний">
                            </div>
                            <div class="col-25">
                                <label for="year">Год сдачи</label>
                                <input type="text" id="year" name="year2" placeholder="20xx">
                            </div>
                            <div class="col-25">
                                <label for="mark">Оценка</label>
                                <input type="text" id="mark" name="mark2" placeholder="Баллы">
                            </div>
                        </div>
                        <hr><br>

                        <label for="exam">Экзамен №3</label>
                        <input type="text" id="subject_name" name="subject3" placeholder="Название предмета">
                        <div class="row">
                            <div class="col-50">
                                <label for="type">Тип экзамена</label>
                                <input type="text" id="type_name" name="type3" placeholder="ЕГЭ/внутренний">
                            </div>
                            <div class="col-25">
                                <label for="year">Год сдачи</label>
                                <input type="text" id="year" name="year3" placeholder="20xx">
                            </div>
                            <div class="col-25">
                                <label for="mark">Оценка</label>
                                <input type="text" id="mark" name="mark3" placeholder="Баллы">
                            </div>
                        </div>
                        <hr><br>

                        <label for="exam">Экзамен №4</label>
                        <input type="text" id="subject_name" name="subject4" placeholder="Название предмета">
                        <div class="row">
                            <div class="col-50">
                                <label for="type">Тип экзамена</label>
                                <input type="text" id="type_name" name="type4" placeholder="ЕГЭ/внутренний">
                            </div>
                            <div class="col-25">
                                <label for="year">Год сдачи</label>
                                <input type="text" id="year" name="year4" placeholder="20xx">
                            </div>
                            <div class="col-25">
                                <label for="mark">Оценка</label>
                                <input type="text" id="mark" name="mark4" placeholder="Баллы">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="col-25">
                        <h3>Полученное образование</h3>
                        <label for="graduate">Название учебного заведения</label>
                        <input type="text" id="graduate_name" name="graduate1" placeholder="Название школы/колледжа/института...">
                        <div class="row">
                            <div class="col-50">
                                <label for="">Адрес учебного заведения</label>
                                <input type="text" id="univer_address" name="univer_address" placeholder="Улица/дом">
                            </div>
                            <div class="col-50">
                                <label for="region_city">Город</label>
                                <input type="text" id="region_city_name" name="city1" placeholder="Регион/город">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Уровень образования</label>
                                <input type="text" id="expyear" name="expyear" placeholder="Среднее/высшее...">
                            </div>
                            <div class="col-25">
                                <label for="cvv">Дата окончания</label>
                                <input type="text" id="cvv" name="cvv" class="mask-date form-control" placeholder="год-месяц-день">
                            </div>
                        </div>
                        <hr><br>

                        <label for="graduate">Название учебного заведения</label>
                        <input type="text" id="graduate_name" name="graduate1" placeholder="Название школы/колледжа/института...">
                        <div class="row">
                            <div class="col-50">
                                <label for="">Адрес учебного заведения</label>
                                <input type="text" id="univer_address" name="univer_address" placeholder="Улица/дом">
                            </div>
                            <div class="col-50">
                                <label for="region_city">Город</label>
                                <input type="text" id="region_city_name" name="city1" placeholder="Регион/город">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Уровень образования</label>
                                <input type="text" id="expyear" name="expyear" placeholder="Среднее/высшее...">
                            </div>
                            <div class="col-25">
                                <label for="cvv">Дата окончания</label>
                                <input type="text" id="cvv" name="cvv" class="mask-date form-control" placeholder="год-месяц-день">
                            </div>
                        </div>
                        <hr><br>

                        <label for="graduate">Название учебного заведения</label>
                        <input type="text" id="graduate_name" name="graduate1" placeholder="Название школы/колледжа/института...">
                        <div class="row">
                            <div class="col-50">
                                <label for="">Адрес учебного заведения</label>
                                <input type="text" id="univer_address" name="univer_address" placeholder="Улица/дом">
                            </div>
                            <div class="col-50">
                                <label for="region_city">Город</label>
                                <input type="text" id="region_city_name" name="city1" placeholder="Регион/город">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Уровень образования</label>
                                <input type="text" id="expyear" name="expyear" placeholder="Среднее/высшее...">
                            </div>
                            <div class="col-25">
                                <label for="cvv">Дата окончания</label>
                                <input type="text" id="cvv" name="cvv" class="mask-date form-control" placeholder="год-месяц-день">
                            </div>
                        </div>
                    </div>


                    <div class="col-50">
                        <h3>Абитуриент подал заявления в следующие вузы:</h3>
                        <!--ВУЗ №1-->
                        <hr><br>
                        <div class="row">
                            <div class="col-15">
                                <label for="university">ВУЗ №1</label>
                                <input type="text" id="university_name" name="university1" placeholder="Название ВУЗа">
                            </div>
                            <div class="col-5">
                                <label for="study_form">Форма обучения</label>
                                <input type="text" id="study_form_name" name="study_form1" placeholder="Очная/заочная/...">
                            </div>
                            <div class="col-5">
                                <label for="place">На место:</label>
                                <input type="text" id="place_name" name="place1" placeholder="Бюджет/платно/...">
                            </div>
                            <div class="col-15">
                                <label>
                                    Зачислен:<input type="checkbox" class="checkbox_style" name="sameadr">
                                    Согласен на зачисление:<input type="checkbox" class="checkbox_style" name="consent">
                                    Нуждается в общежитии:<input type="checkbox" class="checkbox_style" name="dormitory">
                                    Целевое направление:<input type="checkbox" class="checkbox_style" name="target">
                                    Подал оригинал:<input type="checkbox" class="checkbox_style" name="original">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="specialty_name">По специальности:</label>
                                <input type="text" id="specialty_name" name="specialty_name" placeholder="Название специальности">
                            </div>
                            <div class="col-5">
                                <label for="specialty_code">Код специальности</label>
                                <input type="text" id="specialty_code" name="specialty_code" class="mask-specialty form-control" placeholder="xx.xx.xx">
                            </div>
                            <div class="col-5">
                                <label for="degree_name">Уровень образования:</label>
                                <input type="text" id="degree_name" name="degree_name" placeholder="Бакалавриат/специалитет/...">
                            </div>
                        </div>
                        <br><hr><br>

                        <!--ВУЗ №2-->
                        <div class="row">
                            <div class="col-15">
                                <label for="university">ВУЗ №2</label>
                                <input type="text" id="university_name" name="university2" placeholder="Название ВУЗа">
                            </div>
                            <div class="col-5">
                                <label for="study_form">Форма обучения</label>
                                <input type="text" id="study_form_name" name="study_form2" placeholder="Очная/заочная/...">
                            </div>
                            <div class="col-5">
                                <label for="place">На место:</label>
                                <input type="text" id="place_name" name="place2" placeholder="Бюджет/платно/...">
                            </div>
                            <div class="col-15">
                                <label>
                                    Зачислен:<input type="checkbox" class="checkbox_style" name="sameadr">
                                    Согласен на зачисление:<input type="checkbox" class="checkbox_style" name="consent2">
                                    Нуждается в общежитии:<input type="checkbox" class="checkbox_style" name="dormitory2">
                                    Целевое направление:<input type="checkbox" class="checkbox_style" name="target2">
                                    Подал оригинал:<input type="checkbox" class="checkbox_style" name="original2">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="specialty_name">По специальности:</label>
                                <input type="text" id="specialty_name" name="specialty_name2" placeholder="Название специальности">
                            </div>
                            <div class="col-5">
                                <label for="specialty_code">Код специальности</label>
                                <input type="text" id="specialty_code" name="specialty_code2" class="mask-specialty form-control" placeholder="xx.xx.xx">
                            </div>
                            <div class="col-5">
                                <label for="degree_name">Уровень образования:</label>
                                <input type="text" id="degree_name" name="degree_name2" placeholder="Бакалавриат/специалитет/...">
                            </div>
                        </div>
                        <br><hr><br>

                        <!--ВУЗ №3-->
                        <div class="row">
                            <div class="col-15">
                                <label for="university">ВУЗ №3</label>
                                <input type="text" id="university_name" name="university3" placeholder="Название ВУЗа">
                            </div>
                            <div class="col-5">
                                <label for="study_form">Форма обучения</label>
                                <input type="text" id="study_form_name" name="study_form3" placeholder="Очная/заочная/...">
                            </div>
                            <div class="col-5">
                                <label for="place">На место:</label>
                                <input type="text" id="place_name" name="place3" placeholder="Бюджет/платно/...">
                            </div>
                            <div class="col-15">
                                <label>
                                    Зачислен:<input type="checkbox" class="checkbox_style" name="sameadr">
                                    Согласен на зачисление:<input type="checkbox" class="checkbox_style" name="consent3">
                                    Нуждается в общежитии:<input type="checkbox" class="checkbox_style" name="dormitory3">
                                    Целевое направление:<input type="checkbox" class="checkbox_style" name="target3">
                                    Подал оригинал:<input type="checkbox" class="checkbox_style" name="original3">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="specialty_name">По специальности:</label>
                                <input type="text" id="specialty_name" name="specialty_name3" placeholder="Название специальности">
                            </div>
                            <div class="col-5">
                                <label for="specialty_code">Код специальности</label>
                                <input type="text" id="specialty_code" name="specialty_code3" class="mask-specialty form-control" placeholder="xx.xx.xx">
                            </div>
                            <div class="col-5">
                                <label for="degree_name">Уровень образования:</label>
                                <input type="text" id="degree_name" name="degree_name3" placeholder="Бакалавриат/специалитет/...">
                            </div>
                        </div>
                        <br><hr><br>

                        <!--ВУЗ №4-->
                        <div class="row">
                            <div class="col-15">
                                <label for="university">ВУЗ №4</label>
                                <input type="text" id="university_name" name="university4" placeholder="Название ВУЗа">
                            </div>
                            <div class="col-5">
                                <label for="study_form">Форма обучения</label>
                                <input type="text" id="study_form_name" name="study_form4" placeholder="Очная/заочная/...">
                            </div>
                            <div class="col-5">
                                <label for="place">На место:</label>
                                <input type="text" id="place_name" name="place4" placeholder="Бюджет/платно/...">
                            </div>
                            <div class="col-15">
                                <label>
                                    Зачислен:<input type="checkbox" class="checkbox_style" name="sameadr">
                                    Согласен на зачисление:<input type="checkbox" class="checkbox_style" name="consent4">
                                    Нуждается в общежитии:<input type="checkbox" class="checkbox_style" name="dormitory4">
                                    Целевое направление:<input type="checkbox" class="checkbox_style" name="target4">
                                    Подал оригинал:<input type="checkbox" class="checkbox_style" name="original4">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="specialty_name">По специальности:</label>
                                <input type="text" id="specialty_name" name="specialty_name4" placeholder="Название специальности">
                            </div>
                            <div class="col-5">
                                <label for="specialty_code">Код специальности</label>
                                <input type="text" id="specialty_code" name="specialty_code4" class="mask-specialty form-control" placeholder="xx.xx.xx">
                            </div>
                            <div class="col-5">
                                <label for="degree_name">Уровень образования:</label>
                                <input type="text" id="degree_name" name="degree_name4" placeholder="Бакалавриат/специалитет/...">
                            </div>
                        </div>
                        <br><hr><br>

                        <!--ВУЗ №5-->
                        <div class="row">
                            <div class="col-15">
                                <label for="university">ВУЗ №5</label>
                                <input type="text" id="university_name" name="university5" placeholder="Название ВУЗа">
                            </div>
                            <div class="col-5">
                                <label for="study_form">Форма обучения</label>
                                <input type="text" id="study_form_name" name="study_form5" placeholder="Очная/заочная/...">
                            </div>
                            <div class="col-5">
                                <label for="place">На место:</label>
                                <input type="text" id="place_name" name="place5" placeholder="Бюджет/платно/...">
                            </div>
                            <div class="col-15">
                                <label>
                                    Зачислен:<input type="checkbox" class="checkbox_style" name="sameadr">
                                    Согласен на зачисление:<input type="checkbox" class="checkbox_style" name="consent5">
                                    Нуждается в общежитии:<input type="checkbox" class="checkbox_style" name="dormitory5">
                                    Целевое направление:<input type="checkbox" class="checkbox_style" name="target5">
                                    Подал оригинал:<input type="checkbox" class="checkbox_style" name="original5">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="specialty_name">По специальности:</label>
                                <input type="text" id="specialty_name" name="specialty_name5" placeholder="Название специальности">
                            </div>
                            <div class="col-5">
                                <label for="specialty_code">Код специальности</label>
                                <input type="text" id="specialty_code" name="specialty_code5" class="mask-specialty form-control" placeholder="xx.xx.xx">
                            </div>
                            <div class="col-5">
                                <label for="degree_name">Уровень образования:</label>
                                <input type="text" id="degree_name" name="degree_name5" placeholder="Бакалавриат/специалитет/...">
                            </div>
                        </div>
                        <br><hr><br>

                        <!--ВУЗ №6-->
                        <div class="row">
                            <div class="col-15">
                                <label for="university">ВУЗ №6</label>
                                <input type="text" id="university_name" name="university6" placeholder="Название ВУЗа">
                            </div>
                            <div class="col-5">
                                <label for="study_form">Форма обучения</label>
                                <input type="text" id="study_form_name" name="study_form6" placeholder="Очная/заочная/...">
                            </div>
                            <div class="col-5">
                                <label for="place">На место:</label>
                                <input type="text" id="place_name" name="place6" placeholder="Бюджет/платно/...">
                            </div>
                            <div class="col-15">
                                <label>
                                    Зачислен:<input type="checkbox" class="checkbox_style" name="sameadr">
                                    Согласен на зачисление:<input type="checkbox" class="checkbox_style" name="consent6">
                                    Нуждается в общежитии:<input type="checkbox" class="checkbox_style" name="dormitory6">
                                    Целевое направление:<input type="checkbox" class="checkbox_style" name="target6">
                                    Подал оригинал:<input type="checkbox" class="checkbox_style" name="original6">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="specialty_name">По специальности:</label>
                                <input type="text" id="specialty_name" name="specialty_name6" placeholder="Название специальности">
                            </div>
                            <div class="col-5">
                                <label for="specialty_code">Код специальности</label>
                                <input type="text" id="specialty_code" name="specialty_code6" class="mask-specialty form-control" placeholder="xx.xx.xx">
                            </div>
                            <div class="col-5">
                                <label for="degree_name">Уровень образования:</label>
                                <input type="text" id="degree_name" name="degree_name6" placeholder="Бакалавриат/специалитет/...">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Добавить" name="entrant-create" class="btn">
            </form>
        </div>
    </div>
</div>
</main>

<script src="../../assets/js/jquery-3.4.1.min.js"></script>
<script src="https://snipp.ru/cdn/maskedinput/jquery.maskedinput.min.js"></script>
<script src="../../assets/js/scripts.js"></script>

</body>
</html>
