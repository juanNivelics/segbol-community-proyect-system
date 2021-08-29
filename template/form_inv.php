<?php

function registration_form_inv($password, $email, $first_name, $last_name, $country, $city, $date, $born, $type_profile, $busc_invetirP, $bus_dinero, $busc_voluntP, $busc_networking, $bus_alianza, $bus_recibir, $bus_herramien, $bus_mentor, $bus_aportar, $bus_otro, $bus_Nuevo, $ctg_saludBienestar, $ctg_educacionCalidad, $ctg_inclusionPobreza, $ctg_transparenciaJ, $ctg_impactoMedio, $ctg_ciudadesCo, $team, $otherCountry)
{ 
	 $value = "Ej: Nuevas ideas de proyectos";
    $current_user = wp_get_current_user();
    $current_email = $current_user->user_email;
    if ($current_email == '') {
        if (isset($_GET['email'])) {
            $current_email = $_GET['email'];
        } else {
            $current_email = "";
        }
    }
    echo '
    <div class="row">
      <div class="box-content col-12">
        <div class="step-form" style="text-align:center;margin-top:40px;">
            <span class="step">Información personal</span>
            <span class="step">Intereses</span>
        </div>
      </div>
      <div class="box-content col-12">
        <article class="form1">
            <form id="regForm" name="regForm"  method="post" enctype="multipart/form-data"  onsubmit="return checkCheckBoxes(this);" >
                <div class="tab">
                    <h2>Iniciemos con tus datos</h2>
                    <p>Los campos marcados con * son obligatorios</p>
                    <div class="mb-3 form-row">
                        <div class="col">
                            <label for="firstname">Nombres <strong>*</strong></label>
                            <input type="text" class="form-control" placeholder="Ej: Marco Andres" onkeypress="return permite(event, \'car\')" name="fname" value="' . (isset($_GET['fname']) ? $first_name : null) . '" required>
                        </div>
                        <div class="col">
                            <label for="website">Apellidos <strong>*</strong></label>
                            <input type="text" class="form-control" placeholder="Ej: Mosquera Ospino" onkeypress="return permite(event, \'car\')" name="lname" value="' . (isset($_GET['lname']) ? $last_name : null) . '" required>
                        </div>
                    </div>
                    <div class="mb-3 form-row">
                        <div class="col">
                            <label for="country">Pais de residencia <strong>*</strong></label>
                            <input type="text" class="form-control" placeholder="Ej: Colombia" name="country" onkeypress="return permite(event, \'car\')"  value="' . (isset($_GET['country']) ? $country : null) . '" required>
                        </div>
                        <div class="col">
                            <label for="city">Ciudad de residencia <strong>*</strong></label>
                            <input type="text" class="form-control" placeholder="Ej: Bogotá" name="city" onkeypress="return permite(event, \'car\')"  value="' . (isset($_GET['city']) ? $city : null) . '" required>
                        </div>
                    </div>
                    <div class="mb-3 form-row">
                        <div class="col">
                            <label for="email">Correo electrónico <strong>*</strong></label>
                      
                            <input type="text" class="form-control"  id="email01" placeholder="Ej: md-cifuentes@mail.com" name="email" value="' . (isset($_GET['email']) ? $_GET['email'] : null) . '"  readonly required><label id="response"></label>
</div>
                        <div class="col">
                            <label for="password">Contraseña <strong>*</strong></label>
                            <input type="password" class="form-control" placeholder="Digite contraseña, mín 8 caracteres" name="password" value="' . (isset($_POST['password']) ? $password : null) . '" required>
                        </div>
                    </div>
                    <div class="mb-3 form-row">
                        <div class="col date-birth">
                            <label for="date">Fecha de nacimiento <strong>*</strong></label>
                            <input type="text" class="form-control" id="date"  max="2011-12-31" placeholder="DD/MM/AAAA" name="date" value="' . (isset($_POST['date']) ? $date : null) . '" required>
                        </div>
                        <div class="col">
                            <label for="born">Pais de nacimiento</label>
                            <input type="text" class="form-control" placeholder="Ej: Colombia" onkeypress="return permite(event, \'car\')" name="born" value="' . (isset($_GET['born']) ? $born : null) . '" >
                        </div>
                    </div>
                </div>
               
               
                <div class="tab">
                    <h2 id="seccionD">Cuéntanos tus intereses</h2>
                    <p>Los campos marcados con * son obligatorios</p>
                    <div class="cual">
                        <div class="mb-3 form-row">
                            <div class="col-12" style="display: none;">
                                <label for="">¿Cuál perfil viene a desempeñar? *
                                <button type="button" class="border-0" data-toggle="tooltip" data-placement="bottom" title="Puede cambiar el rol cuando lo considere necesario, pero solo puede ejercer una rol a la vez.">
                                    <i class="far fa-question-circle"></i>
                                </button>
                                </label>
                                <div class="p-3 row categoriesProfile registerInput">
                                    <div class="mt-2 mb-2 col-12 d-flex profileDiv" id="empren_rol" >
                                        <input id="profile_emprendedor" class="form-check-input checkProfile" type="radio" name="type_profile" value="type_emprendedores" onclick="myRol();" value="' . (isset($_POST['type_profile']) ? $type_profile : null) . '" checked >
                                        <img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/05/31122104/icon_emprendedor.png" alt="" with="auto" height="70">
                                        <label class="text" for ="profile_emprendedor">
                                            <h3>Emprendedores</h3>
                                            <p class="pl-0">Socios fundadores de emprendimientos innovadores con un importante componente social.</p>
                                        </label>
                                    </div>
                     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="busca">
                        <label for="">¿Qué busca en Social-Skin? *</label>
                        <label id="endTimeLabel1" class="mt-3 errorMsg h2" style="display:none;color:red;margin:1em;">Debe seleccionar al menos 1</label>
                        <div class="mb-3 form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input id="busc_invetirP" class="form-check-input" type="checkbox" value="busc_invetirP" name="busc_invetirP" value="' . (isset($_POST['busc_invetirP']) ? $busc_invetirP : null) . '">
                                    <label class="form-check-label" for="busc_invetirP">
                                        Invertir en proyectos
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input id="busc_voluntP" class="form-check-input" type="checkbox" value="busc_voluntP" name="busc_voluntP" value="' . (isset($_POST['busc_voluntP']) ? $busc_voluntP : null) . '">
                                    <label class="form-check-label" for="busc_voluntP">
                                        Voluntario para un proyecto de negocio
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input id="busc_networking" class="form-check-input" type="checkbox" value="busc_networking" name="busc_networking" value="' . (isset($_POST['busc_networking']) ? $busc_networking : null) . '">
                                    <label class="form-check-label" for="busc_networking">
                                        Networking
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_herramien" class="form-check-input" type="checkbox" value="bus_herramien" name="bus_herramien" value="' . (isset($_POST['bus_herramien']) ? $bus_herramien : null) . '">
                                    <label class="form-check-label" for="bus_herramien">
                                        Herramientas para mejorar
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_mentor" class="form-check-input" type="checkbox" value="bus_mentor" name="bus_mentor" value="' . (isset($_POST['bus_mentor']) ? $bus_mentor : null) . '">
                                    <label class="form-check-label" for="bus_mentor">
                                        Dar mentoría
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_aportar" class="form-check-input" type="checkbox" value="bus_aportar" name="bus_aportar" value="' . (isset($_POST['bus_aportar']) ? $bus_aportar : null) . '">
                                    <label class="form-check-label" for="bus_aportar">
                                        Aportar con mi trabajo y conocimiento
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_dinero" class="form-check-input" type="checkbox" value="bus_dinero" name="bus_dinero" value="' . (isset($_POST['bus_dinero']) ? $bus_dinero : null) . '">
                                    <label class="form-check-label" for="bus_dinero">
                                        Dinero para mi proyecto
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_recibir" class="form-check-input" type="checkbox" value="bus_recibir" name="bus_recibir" value="' . (isset($_POST['bus_recibir']) ? $bus_recibir : null) . '">
                                    <label class="form-check-label" for="bus_recibir">
                                        Recibir mentoría
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_alianza" class="form-check-input" type="checkbox" value="bus_alianza" name="bus_alianza" value="' . (isset($_POST['bus_alianza']) ? $bus_alianza : null) . '">
                                    <label class="form-check-label" for="bus_alianza">
                                        Alianzas con proyectos relacionados
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_otro" class="form-check-input tab2" type="checkbox" value="bus_otro" name="bus_otro" onchange="comprobar();" value="' . (isset($_POST['bus_otro']) ? $bus_otro : null) . '">
                                    <label class="form-check-label" for="bus_otro">
                                        Otro
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="border-0 col">
                                <div class="form-check"></div>
                            </div>
                            <div class="col">
                                <div class="pl-0 form-check">
                                <input class="form-check-input tab2"  id="bus_Nuevo" name="bus_Nuevo" placeholder="Ej: Nuevas ideas de proyectos" readonly="true" value="' . (isset($_GET['bus_Nuevo']) ? $bus_Nuevo : null) . '">                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="categoryForm">
                        <label for="">Seleccione las categorías que le interesan:</label>
                        <div class="mb-3 form-row">
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <input id="ctg_saludBienestar" class="form-check-input categoryI" type="checkbox" value="ctg_saludBienestar" name="ctg_saludBienestar" value="' . (isset($_POST['ctg_saludBienestar']) ? $ctg_saludBienestar : null) . '">
                                    <label class="form-check-label" for="ctg_saludBienestar">
                                    <i class="icon-heart2"></i>
                                        Salud y bienestar
                                    </label>
                                </div>
                            </div>
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <input id="ctg_educacionCalidad" class="form-check-input categoryI" type="checkbox" name="ctg_educacionCalidad" value="ctg_educacionCalidad" value="' . (isset($_POST['ctg_educacionCalidad']) ? $ctg_educacionCalidad : null) . '">
                                    <label class="form-check-label" for="ctg_educacionCalidad">
                                    <i class="icon-books"></i>
                                        Educación de calidad
                                    </label>
                                </div>
                            </div>
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <input id="ctg_inclusionPobreza" class="form-check-input categoryI" type="checkbox" name="ctg_inclusionPobreza" value="ctg_inclusionPobreza"  value="' . (isset($_POST['ctg_inclusionPobreza']) ? $ctg_inclusionPobreza : null) . '">
                                    <label class="form-check-label" for="ctg_inclusionPobreza">
                                    <i class="icon-hands"></i>
                                        Inclusión, reducción de desigualdes y pobreza
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <input id="ctg_transparenciaJ" class="form-check-input categoryI" type="checkbox" name="ctg_transparenciaJ" value=="ctg_transparenciaJ" value="' . (isset($_POST['ctg_transparenciaJ']) ? $ctg_transparenciaJ : null) . '">
                                    <label class="form-check-label" for="ctg_transparenciaJ">
                                    <i class="icon-peace"></i>
                                        Transparencia, justicia y cero corrupción
                                    </label>
                                </div>
                            </div>
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <input id="ctg_impactoMedio" class="form-check-input categoryI" type="checkbox" name="ctg_impactoMedio" value="ctg_impactoMedio" value="' . (isset($_POST['ctg_impactoMedio']) ? $ctg_impactoMedio : null) . '">
                                    <label class="form-check-label" for="ctg_impactoMedio">
                                    <i class="icon-plant"></i>
                                        Impacto al medio ambiente
                                    </label>
                                </div>
                            </div>
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <input id="ctg_ciudadesCo" class="form-check-input categoryI" type="checkbox" name="ctg_ciudadesCo" value="ctg_ciudadesCo" value="' . (isset($_POST['ctg_ciudadesCo']) ? $ctg_ciudadesCo : null) . '">
                                    <label class="form-check-label" for="ctg_ciudadesCo">
                                    <i class="icon-build"></i>
                                        Ciudades y comunidades sostenibles
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-legal" id="form-legal" >
                        <div class="col">
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" id="check_AceptoT" required>
                                <label class="form-check-label" for="check_AceptoT">
                                    Acepto los <a target="_blank" href="/comunidad/terminos-y-condiciones" alt="pagina terminos y condiciones">Términos y condiciones</a>, así como también, la <a target="_blank" href="/comunidad/politica-de-privacidad" alt="pagina politica-de-privacidad">Política de privacidad. * </a>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_AceptoP" required>
                                <label class="form-check-label" for="check_AceptoP">
                                    Acepto la <a target="_blank" href="/comunidad/tratamiento-de-datos" alt="tratamiento de datos page">Política de Tratamiento de datos.*</a>
                                    <p><small>Los datos son usados en la Comunidad Social-Skin para generar Networking y serán almacenados en la base de datos de Social Skin durante el tiempo que el perfil esté activo en la comunidad.</small></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_autoriz">
                                <label class="form-check-label" for="check_autoriz">
                                    Autorizo de manera expresa el envío de información comercial de Social-Skin y demás compañías que hacen parte del Grupo Empresarial Bolívar.
                                </label>
                            </div>
							<label id="slectDos" class="mt-3 errorMsg h2" style="display:none; color:red;">Seleccione alguno</label>
                        </div>
                        <div class="text-left col-12" style="display:none;">
                        <label for="nameProject">Nombre del proyecto *</label>
                        <input type="text" class="form-control" maxlength="80" placeholder="Si tiene siglas, ¿qué significan?. Máximo 80 caracteres..." name="nameProject" value="' . (isset($_GET['nameProject']) ? $_GET['nameProject'] : null) . '" required>
                    </div>
                    </div>
                </div>
               
                <div class="action-form">
                    <button type="button" id="prevBtn" class="btn bg_orange outline" onclick="nextPrev">Volver</button>
                                           <button type="button" id="nextBtn" class="btn bg_orange" onclick="">Continuar</button> 
                                           <input type="submit" name="submit" id="submit" value="Register"  style="display:none;"/>
                                           </div>
            </form>
        </article>
    </div>
</div>';
}



function registration_validation_inv($password, $email)
{
    global $reg_errors;
    $reg_errors = new WP_Error;
    if (empty($password) || empty($email)) {
        $reg_errors->add('field', 'Required form field is missing');
    }
    if (5 > strlen($password)) {
        $reg_errors->add('password', 'Password length must be greater than 5');
    }
    if (!is_email($email)) {
        $reg_errors->add('email_invalid', 'El correo es invalido');
    }
    
    // if (is_wp_error($reg_errors)) {

    //     foreach ($reg_errors->get_error_messages() as $error) {

    //         echo '<div>';
    //         echo '<strong>ERROR</strong>:';
    //         echo $error . '<br/>';
    //         echo '</div>';
    //     }
    // }
    // print_r ($reg_errors);
}

function complete_registration_inv()
{
    global $reg_errors, $password, $email, $first_name, $last_name, $country, $city, $date, $born, $type_profile, $bus_dinero, $bus_recibir, $busc_invetirP, $bus_alianza, $busc_voluntP, $busc_networking, $bus_herramien, $bus_mentor, $bus_aportar, $bus_otro, $bus_Nuevo, $ctg_saludBienestar, $ctg_educacionCalidad, $ctg_inclusionPobreza, $ctg_transparenciaJ, $ctg_impactoMedio, $ctg_ciudadesCo, $nameProject, $team, $otherCountry;

    if (1 > count($reg_errors->get_error_messages())) {
        $userdata = array(
            'user_login'            => $email,
            'user_email'            => $email,
            'user_pass'             => $password,
            'first_name'            => $first_name,
            'last_name'             => $last_name,
            'country'               => $country,
            'city'                  => $city,
            'date'                  => $date,
            'born'                  => $born,
            'type_profile'          => $type_profile,
            'busc_invetirP'         => $busc_invetirP,
            'busc_voluntP'          => $busc_voluntP,
            'bus_dinero'            => $bus_dinero,
            'busc_networking'       => $busc_networking,
            'bus_herramien'         => $bus_herramien,
            'bus_mentor'            => $bus_mentor,
            'bus_aportar'           => $bus_aportar,
            'bus_alianza'           => $bus_alianza,
            'bus_recibir'           => $bus_recibir,
            'bus_otro'              => $bus_otro,
            'bus_Nuevo'             => $bus_Nuevo,
            'ctg_saludBienestar'    => $ctg_saludBienestar,
            'ctg_educacionCalidad'  => $ctg_educacionCalidad,
            'ctg_inclusionPobreza'  => $ctg_inclusionPobreza,
            'ctg_transparenciaJ'    => $ctg_transparenciaJ,
            'ctg_impactoMedio'      => $ctg_impactoMedio,
            'ctg_ciudadesCo'        => $ctg_ciudadesCo,
            'nameProject'            => $nameProject,
            'team'                   => $team,
            'otherCountry'          => $otherCountry
            //'check_AceptoT'         => $check_AceptoT,
            //'check_AceptoP'         => $check_AceptoP,
            //'check_autoriz'         => $check_autoriz
        );
        if (!$user_id)
        {  
        $user_id = wp_insert_user($userdata);	
        }
        if($user_id){
            foreach($userdata as $key => $value) {
                update_user_meta( $user_id, $key, $value );
            }
             header('Location:'.get_bloginfo('url'));  
        }


    }
    
    $sURL    = site_url();
    $emailuser = $email;
    $nombre = $first_name;
    $proyecto = $nameProject;
    $teamemail = $team;


    $mensaje2 = '&nbsp; <table style="display: block; background: url("https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/21102046/fondo.png"); background-size: 100%; background-repeat: no-repeat;" border="0" width="650" cellspacing="0" cellpadding="0" align="center">
    <tbody style="display: block;background: url(https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/21102046/fondo.png);background-size:100%; background-repeat: no-repeat;max-width:750px; ">
    <tr style="border-color: transparent !important; border: 0 !important; display: block;">
    <td style="text-align: center; font-size: 13px; color: #000000; line-height: 19px; display: block; margin: 0 auto;" valign="top" width="450">
    <div style="width: 100%; height: auto; margin: 0 auto; padding-top: 1px;">
    <p style="text-align: center; margin-top: 2rem;"><img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/06/23065420/logo_socialSkin.png" alt="logo social skin" height="70" /></p>
    </div>
    <div style="width:450px;background:#fff;height:auto;padding:33px 0px;border-radius: 9px;border-style: solid;border-width: 2px;border-color: #dedede;/* -webkit-box-shadow: 3px 5px 15px 5px rgba(0,0,0,0.31); *//* box-shadow: 3px 5px 15px 5px rgba(0,0,0,0.31); */">
    <p style="text-align: center;"><img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/20101600/checkRegister.png" alt="icono Check" height="105" /></p>
    <span style="padding: 0; margin: 0; text-align: center; font-style: normal; font-weight: 750; font-size: 24px; line-height: 35px; color: #70c149; display: block;">
    ¡Hola ' . $nombre . '!
    </span>
    <p style="line-height: 0; margin: 10px 0; text-align: center;"><img src=" https://d18woz4tua30qj.cloudfront.net/comunidad/wp-content/uploads/2021/07/26203231/rectangulo-mail.png" alt="guion" height="2"></p>
    <span style="padding: 0; margin: 0; text-align: center; font-style: normal; font-weight: 500; font-size: 16px; line-height: 23px; color: #828282; display: block;">
    ¡Gracias por unirte a Social Skin!
    </span>
    <span style="padding: 0; margin: 20px 0 0; text-align: center; font-style: normal; font-weight: 500; font-size: 16px; line-height: 23px; color: #828282; display: block;">
    Ahora puedes ingresar usando el nombre de usuario y la contraseña que registraste.
    </span>
    <p style="text-align: center; margin-top: 2rem;"><a id="boton" style="background: #DE6B2D; border-radius: 5px; color: #ffffff !important; cursor: pointer; padding: .5rem 1rem; text-decoration: none; font-size: 1rem;" href="' . $sURL . '">Ingresa a Social Skin</a></p>
    </div></td>
    </tr>
    </tbody>
    </table>
    &nbsp';
    $to2 = $emailuser;
    $subject2 = "¡Gracias por unirte a Social Skin!";
    $headers2 = array('Content-Type: text/html; charset=UTF-8');

    $sent2 = wp_mail($to2, $subject2, $mensaje2, $headers2);
    if ($sent2) {
    } else {
        echo $sent2;
    }
    echo '<script>
setTimeout(() => { 
		 $("#emodal-overlay").show();
        $("#emodal-overlay").css({ background: "rgba(0, 0, 0, 0.62)" });
        $("#eModal-2").show();}, 1000);
  </script>';
}

function custom_registration_inv_function()
{
    if (isset($_POST['submit'])) {
        registration_validation_inv(
            $_POST['password'],
            $_POST['email'],
            $_POST['fname'],
            $_POST['lname'],
            $_POST['country'],
            isset($_POST['city']),
            $_POST['date'],
            $_POST['born'],
            $_POST['type_profile'],
            isset($_POST['busc_invetirP']),
            isset($_POST['busc_voluntP']),
            isset($_POST['bus_alianza']),
            isset($_POST['busc_networking']),
            isset($_POST['bus_herramien']),
            isset($_POST['bus_mentor']),
            isset($_POST['bus_dinero']),
            isset($_POST['bus_aportar']),
            isset($_POST['bus_otro']),
            isset($_POST['bus_recibir']),
            isset($_POST['bus_Nuevo']),
            isset($_POST['ctg_saludBienestar']),
            isset($_POST['ctg_educacionCalidad']),
            isset($_POST['ctg_inclusionPobreza']),
            isset($_POST['ctg_transparenciaJ']),
            isset($_POST['ctg_impactoMedio']),
            isset($_POST['ctg_ciudadesCo']),
            isset($_POST['nameProject']),
            isset($_POST['team']),
            isset($_POST['otherCountry'])

            //$_POST['check_AceptoT'],
            //$_POST['check_AceptoP'],
            //$_POST['check_autoriz'],

        );

        // sanitize user form input
        global $password, $email, $first_name, $last_name, $country, $city, $date, $born, $type_profile, $bus_recibir, $busc_invetirP, $bus_dinero,  $busc_voluntP, $bus_alianza, $busc_networking, $bus_herramien, $bus_mentor, $bus_aportar, $bus_otro, $bus_Nuevo, $ctg_saludBienestar, $ctg_educacionCalidad, $ctg_inclusionPobreza, $ctg_transparenciaJ, $ctg_impactoMedio, $ctg_ciudadesCo, $nameProject, $team, $otherCountry;
        $password             = esc_attr($_POST['password']);
        $email                = sanitize_email($_POST['email']);
        $first_name           = sanitize_text_field($_POST['fname']);
        $last_name            = sanitize_text_field($_POST['lname']);
        $country              = esc_textarea($_POST['country']);
        $city                 = esc_textarea($_POST['city']);
        $date                 = esc_textarea($_POST['date']);
        $born                 = esc_textarea($_POST['born']);
        $type_profile         = esc_textarea($_POST['type_profile']);
        $busc_invetirP        = esc_textarea(isset($_POST['busc_invetirP']));
        $bus_alianza          = esc_textarea(isset($_POST['bus_alianza']));
        $bus_dinero          = esc_textarea(isset($_POST['bus_dinero']));
        $busc_voluntP         = esc_textarea(isset($_POST['busc_voluntP']));
        $bus_recibir         = esc_textarea(isset($_POST['bus_recibir']));
        $busc_networking      = esc_textarea(isset($_POST['busc_networking']));
        $bus_herramien        = esc_textarea(isset($_POST['bus_herramien']));
        $bus_mentor           = esc_textarea(isset($_POST['bus_mentor']));
        $bus_aportar          = esc_textarea(isset($_POST['bus_aportar']));
        $bus_otro             = esc_textarea(isset($_POST['bus_otro']));
        $bus_Nuevo            = esc_textarea(isset($_POST['bus_Nuevo']));
        $ctg_saludBienestar   = esc_textarea(isset($_POST['ctg_saludBienestar']));
        $ctg_educacionCalidad = esc_textarea(isset($_POST['ctg_educacionCalidad']));
        $ctg_inclusionPobreza = esc_textarea(isset($_POST['ctg_inclusionPobreza']));
        $ctg_transparenciaJ   = esc_textarea(isset($_POST['ctg_transparenciaJ']));
        $ctg_impactoMedio     = esc_textarea(isset($_POST['ctg_impactoMedio']));
        $ctg_ciudadesCo       = esc_textarea(isset($_POST['ctg_ciudadesCo']));
        $nameProject          = esc_textarea(isset($_POST['nameProject']));
        $team                 = sanitize_text_field(isset($_POST['team']));
        $otherCountry         = sanitize_text_field(isset($_POST['otherCountry']));
        //$check_AceptoT        = esc_textarea($_POST['check_AceptoT']);
        //$check_AceptoP        = esc_textarea($_POST['check_AceptoP']);
        //$check_autoriz        = esc_textarea($_POST['check_autoriz']);
        //user posted variables


        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration_inv(
            $password,
            $email,
            $first_name,
            $last_name,
            $country,
            $city,
            $date,
            $born,
            $type_profile,
            $busc_invetirP,
            $busc_voluntP,
            $bus_recibir,
            $bus_alianza,
            $bus_dinero,
            $busc_networking,
            $bus_herramien,
            $bus_mentor,
            $bus_aportar,
            $bus_otro,
            $bus_Nuevo,
            $ctg_saludBienestar,
            $ctg_educacionCalidad,
            $ctg_inclusionPobreza,
            $ctg_transparenciaJ,
            $ctg_impactoMedio,
            $ctg_ciudadesCo,
            $nameProject,
            $team,
            $otherCountry
            //$check_AceptoT,
            //$check_AceptoP,
            //$check_autoriz,
        );
    }

    registration_form_inv(
        isset($password),
        isset($email),
        isset($first_name),
        isset($last_name),
        isset($country),
        isset($city),
        isset($date),
        isset($born),
        isset($type_profile),
        isset($busc_invetirP),
        isset($busc_voluntP),
        isset($bus_recibir),
        isset($bus_alianza),
        isset($bus_dinero),
        isset($busc_networking),
        isset($bus_herramien),
        isset($bus_mentor),
        isset($bus_aportar),
        isset($bus_otro),
        isset($bus_Nuevo),
        isset($ctg_saludBienestar),
        isset($ctg_educacionCalidad),
        isset($ctg_inclusionPobreza),
        isset($ctg_transparenciaJ),
        isset($ctg_impactoMedio),
        isset($ctg_ciudadesCo),
        isset($nameProject),
        isset($team),
        isset($otherCountry)
        //$check_AceptoT,
        //$check_AceptoP,
        //$check_autoriz,
    );
}


// Register a new shortcode: [cr_custom_registration]
add_shortcode('cr_custom_registration', 'custom_registration_shortcode_reg_inv');

// The callback function that will replace [book]
function custom_registration_shortcode_reg_inv()
{
    ob_start();
    custom_registration_inv_function();
    return ob_get_clean();
}