<h2 class="content__main-heading">Вход на сайт</h2>
<form class="form" action="" method="post">
    <div class="form__row">
        <label class="form__label" for="email">E-mail <sup>*</sup></label>

        <input class="form__input <?=isset($errors['email'])?'form__input--error':''?>" type="text" name="email" id="email" value="<?=!empty($_POST['email'])?$_POST['email']:''?>" placeholder="Введите e-mail">

        <?php if (isset($errors['email'])):?>
            <p class="form__message">Введите корректный E-mail</p>
        <?php endif;?>
    </div>

    <div class="form__row">
        <label class="form__label" for="password">Пароль <sup>*</sup></label>

        <input class="form__input <?=isset($errors['password'])?'form__input--error':''?>" type="password" name="password" id="password" value="" placeholder="Введите пароль">

        <?php if (isset($errors['password'])):?>
            <p class="form__message">Введите пароль</p>
        <?php endif;?>
    </div>

    <div class="form__row form__row--controls">
        <?php if(isset($errors)):?>
            <p class="error-message">Пожалуйста, исправьте ошибки в форме</p>
            <?php foreach ($errors as $key => $error):?>
                <p class="error-message">[<?=$dict[$key]?>] - <?=$error?></p>
            <?php endforeach;?>
        <?php endif;?>

        <input class="button" type="submit" name="" value="Войти">
    </div>
</form>
