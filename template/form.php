<?php

function registration_form($password, $email, $first_name, $last_name, $country, $city, $date, $born, $type_profile, $busc_invetirP, $bus_dinero, $busc_voluntP, $busc_networking, $bus_alianza, $bus_recibir, $bus_herramien, $bus_mentor, $bus_aportar, $bus_otro, $bus_Nuevo, $ctg_saludBienestar, $ctg_educacionCalidad, $ctg_inclusionPobreza, $ctg_transparenciaJ, $ctg_impactoMedio, $ctg_ciudadesCo, $team, $nameProject, $otherCountry)
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
	
	
    $current_idS = $current_user->idsocialskin;
    //echo  $current_idS;
    echo '
    <div class="row">
      <div class="box-content col-12">
        <div class="step-form" style="text-align:center;margin-top:40px;">
            <span class="step">Información personal</span>
            <span class="step">Intereses</span>
            <span class="step" id="stepEmpren">Información del proyecto</span>
        </div>
      </div>
    <div class="box-content col-12">
        <article class="form1"> 
            <form id="regForm" name="regForm" method="post" enctype="multipart/form-data"  onsubmit="return checkCheckBoxes(this);" >
                <div class="tab">
                    <h2>Iniciemos con tus datos</h2>
                    <p>Los campos marcados con * son obligatorios</p>
                    <div class="mb-3 form-row">
                        <div class="col">
                            <label for="firstname">Nombres <strong>*</strong></label>
                            <input type="text" class="form-control" onkeypress="return permite(event, \'car\')"  placeholder="Ej: Marco Andres" name="fname" value="' . (isset($_POST['fname']) ? $first_name : null) . '" required>
                        </div>
                        <div class="col">
                            <label for="website">Apellidos <strong>*</strong></label>
                            <input type="text" class="form-control" onkeypress="return permite(event, \'car\')"  placeholder="Ej: Mosquera Ospino" name="lname" value="' . (isset($_POST['lname']) ? $last_name : null) . '" required>
                        </div>
                    </div>
                    <div class="mb-3 form-row">
                        <div class="col">
                            <label for="country">Pais de residencia <strong>*</strong></label>
                            <input type="text" class="form-control" onkeypress="return permite(event, \'car\')"  placeholder="Ej: Colombia" name="country" value="' . (isset($_POST['country']) ? $country : null) . '" required>
                        </div>
                        <div class="col">
                            <label for="city">Ciudad de residencia <strong>*</strong></label>
                            <input type="text" class="form-control" onkeypress="return permite(event, \'car\')"  placeholder="Ej: Bogotá" name="city" value="' . (isset($_POST['city']) ? $city : null) . '" required>
                        </div>
                    </div>
                    <div class="mb-3 form-row">
                        <div class="col">
                            <label for="email">Correo electrónico <strong>*</strong></label>
                            <input type="text" class="form-control" placeholder="Ej: md-cifuentes@mail.com" id="email01" name="email" value="' . (isset($_POST['email']) ?  $current_email : $current_email) . '"    required><label id="response"></label>
                        </div>
                        <div class="col">
                            <label for="password">Contraseña <strong>*</strong></label>
                            <input type="password" class="form-control" placeholder="Digite contraseña, mín 8 caracteres" name="password" value="' . (isset($_POST['password']) ? $password : null) . '" required>
                        </div>
                    </div>
                    <div class="mb-3 form-row">
                        <div class="col date-birth">
                            <label for="date">Fecha de nacimiento <strong>*</strong></label>
                            <input type="text" class="form-control" id="date" maxlength="10"   placeholder="DD/MM/AAAA" name="date" value="' . (isset($_POST['date']) ? $date : null) . '" required>
                        </div>
                        <div class="col">
                            <label for="born">Pais de nacimiento</label>
                            <input type="text" class="form-control" onkeypress="return permite(event, \'car\')"  placeholder="Ej: Colombia" name="born" value="' . (isset($_POST['born']) ? $born : null) . '" >
                        </div>
                    </div>
                </div>
               
                <div class="tab">
                    <h2 id="seccionD">Cuéntanos tus intereses</h2>
                    <p>Los campos marcados con * son obligatorios</p>
                    <div class="cual">
                        <div class="mb-3 form-row">
                            <div class="col-12">
                                <label for="">¿Cuál perfil viene a desempeñar? *
                                <button type="button" class="border-0" data-toggle="tooltip" data-placement="bottom" title="Puede cambiar el rol cuando lo considere necesario, pero solo puede ejercer una rol a la vez.">
                                    <i class="far fa-question-circle"></i>
                                </button>
                                </label>
                                <div class="p-3 row categoriesProfile registerInput">
                                    <div class="mt-2 mb-2 col-12 d-flex profileDiv" id="empren_rol">
                                        <input id="profile_emprendedor" class="form-check-input checkProfile" type="radio" name="type_profile" value="profile_emprendedor" onchange="myRol();" value="' . (isset($_POST['type_profile']) ? $type_profile : null) . '" checked>
                                        <img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/05/31122104/icon_emprendedor.png" alt="" with="auto" height="70">
                                        <label class="text" for ="profile_emprendedor">
                                            <h3>Emprendedores</h3>
                                            <p class="pl-0">Socios fundadores de emprendimientos innovadores con un importante componente social.</p>
                                        </label>
                                    </div>
                                    <div class="mt-2 mb-2 col-12 d-flex profileDiv">
                                        <input id="profile_expert" class="form-check-input checkProfile" type="radio" name="type_profile" value="type_expertos" onchange="myRol();"  value="' . (isset($_POST['type_profile']) ? $type_profile : null) . '" >
                                        <img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/09221924/icon_mentores.png" alt="" with="auto" height="70">
                                        <label class="text" for ="profile_expert">
                                            <h3>Expertos y mentores</h3>
                                            <p class="pl-0">Aportan su conocimento y experticia en las ideas, y proyectos de los emprendedores.</p>
                                        </label>
                                    </div>
                                    <div class="mt-2 mb-2 col-12 d-flex profileDiv">
                                        <input id="profile_volun" class="form-check-input checkProfile" type="radio" name="type_profile"onchange="myRol();"  value="type_voluntario" value="' . (isset($_POST['type_profile']) ? $type_profile : null) . '">
                                        <img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/09221948/icon_voluntario.png" alt="" with="auto" height="70">
                                        <label class="text" for="profile_volun">
                                            <h3>Voluntario</h3>
                                            <p class="pl-0">Aportan su tiempo para ayudar a que los emprendimientos de otros crezcan y sean escalables.</p>
                                        </label>
                                    </div>
                                    <div class="mt-2 mb-2 col-12 d-flex profileDiv">
                                        <input id="profile_invers" class="form-check-input checkProfile" type="radio" name="type_profile" value="type_inversionista" onchange="myRol();"  value="' . (isset($_POST['type_profile']) ? $type_profile : null) . '">
                                        <img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/09221921/icon_inversionistas.png" alt="" with="auto" height="70">
                                        <label class="text" for="profile_invers">
                                            <h3>Inversionista</h3>
                                            <p class="pl-0">Buscan proyectos para invertir.</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="busca">
                        <label for="">¿Qué busca en Social-Skin? *</label>
                        <div class="mb-3 form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input id="busc_invetirP" class="form-check-input tab2" type="checkbox" value="busc_invetirP" name="busc_invetirP" value="' . (isset($_POST['busc_invetirP']) ? $busc_invetirP : null) . '">
                                    <label class="form-check-label" for="busc_invetirP">
                                        Invertir en proyectos
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input id="busc_voluntP" class="form-check-input tab2" type="checkbox" value="busc_voluntP" name="busc_voluntP" value="' . (isset($_POST['busc_voluntP']) ? $busc_voluntP : null) . '">
                                    <label class="form-check-label" for="busc_voluntP">
                                        Voluntario para un proyecto de negocio
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input id="busc_networking" class="form-check-input tab2" type="checkbox" value="busc_networking" name="busc_networking" value="' . (isset($_POST['busc_networking']) ? $busc_networking : null) . '">
                                    <label class="form-check-label" for="busc_networking">
                                        Networking
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_herramien" class="form-check-input tab2" type="checkbox" value="bus_herramien" name="bus_herramien" value="' . (isset($_POST['bus_herramien']) ? $bus_herramien : null) . '">
                                    <label class="form-check-label" for="bus_herramien">
                                        Herramientas para mejorar
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_mentor" class="form-check-input tab2" type="checkbox" value="bus_mentor" name="bus_mentor" value="' . (isset($_POST['bus_mentor']) ? $bus_mentor : null) . '">
                                    <label class="form-check-label" for="bus_mentor">
                                        Dar mentoría
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_aportar" class="form-check-input tab2" type="checkbox" value="bus_aportar" name="bus_aportar" value="' . (isset($_POST['bus_aportar']) ? $bus_aportar : null) . '">
                                    <label class="form-check-label" for="bus_aportar">
                                        Aportar con mi trabajo y conocimiento
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_dinero" class="form-check-input tab2" type="checkbox" value="bus_dinero" name="bus_dinero" value="' . (isset($_POST['bus_dinero']) ? $bus_dinero : null) . '">
                                    <label class="form-check-label" for="bus_dinero">
                                        Dinero para mi proyecto
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_recibir" class="form-check-input tab2" type="checkbox" value="bus_recibir" name="bus_recibir" value="' . (isset($_POST['bus_recibir']) ? $bus_recibir : null) . '">
                                    <label class="form-check-label" for="bus_recibir">
                                        Recibir mentoría
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input id="bus_alianza" class="form-check-input tab2" type="checkbox" value="bus_alianza" name="bus_alianza" value="' . (isset($_POST['bus_alianza']) ? $bus_alianza : null) . '">
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
						<label id="endTimeLabel1" class="mt-3 errorMsg h2" style="display:none;color:red;">Seleccione alguno</label>
                    </div>
                    <div class="categoryForm">
                        <label for="">Seleccione las categorías que le interesan:*</label>
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
                                    <input id="ctg_transparenciaJ" class="form-check-input categoryI" type="checkbox"" name="ctg_transparenciaJ" value=="ctg_transparenciaJ" value="' . (isset($_POST['ctg_transparenciaJ']) ? $ctg_transparenciaJ : null) . '">
                                    <label class="form-check-label" for="ctg_transparenciaJ">
                                    <i class="icon-peace"></i>
                                        Transparencia, justicia y cero corrupción
                                    </label>
                                </div>
                            </div>
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <input id="ctg_impactoMedio" class="form-check-input categoryI" type="checkbox"name="ctg_impactoMedio" value="ctg_impactoMedio" value="' . (isset($_POST['ctg_impactoMedio']) ? $ctg_impactoMedio : null) . '">
                                    <label class="form-check-label" for="ctg_impactoMedio">
                                    <i class="icon-plant"></i>
                                        Impacto al medio ambiente
                                    </label>
                                </div>
                            </div>
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <input id="ctg_ciudadesCo" class="form-check-input categoryI" type="checkbox"name="ctg_ciudadesCo" value="ctg_ciudadesCo" value="' . (isset($_POST['ctg_ciudadesCo']) ? $ctg_ciudadesCo : null) . '">
                                    <label class="form-check-label" for="ctg_ciudadesCo">
                                    <i class="icon-build"></i>
                                        Ciudades y comunidades sostenibles
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-legal"  id="form-legal" style="display:none;" >
                        <div class="col">
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" id="check_AceptoT" name="check_AceptoT" >
                                <label class="form-check-label" for="check_AceptoT">
                                  Acepto los <a target="_blank" href="/comunidad/terminos-y-condiciones" alt="pagina terminos y condiciones">Términos y condiciones</a>, así como también, la <a target="_blank" href="/comunidad/politica-de-privacidad" alt="pagina politica-de-privacidad">Política de privacidad. * </a>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_AceptoP" name="check_AceptoP" >
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
						
                    </div>
                </div>
                <div class="tab" id="rolEmpren">
                    <h2>Información general del proyecto</h2>
                    <p>Los campos marcados con * son obligatorios</p>
                    <div class="mb-3 form-row infoProject">
                        <div class="text-left col-12">
                            <label for="nameProject">Nombre del proyecto *</label>
                            <input type="text" id="nameProject" class="form-control" maxlength="80" placeholder="Si tiene siglas, ¿qué significan?. Máximo 80 caracteres..." name="nameProject" value="' . (isset($_GET['nameProject']) ? $nameProject : null) . '" >
                        </div>
                    </div>
                    <div class="mb-3 form-row addTeamP">
                        <div class="text-left col-12">
                            <h4>Relacione todos los integrantes de su equipo
                                <button type="button" class="border-0" data-toggle="tooltip" data-placement="bottom" title="Enliste los correos electrónicos de todos los integrantes de su equipo, porque se le enviará una invitación a ser parte de la Comunidad Social Skin, asociado a este proyecto.">
                                    <i class="far fa-question-circle"></i>
                                </button>
                            </h4>
                            <label for="team">Correo electrónico
                            </label>
                        </div>
                        <div class="col" id="members">
                            <input type="email" class="form-control" placeholder="Ej: correo@micorreo.com" name="team" id="team" value="' . (isset($_POST['team']) ? $team : null) . '" >
							<label id="responset"></label>
							<br>
                        </div>
                        <div class="text-center col">
                            <label for="addMember">
                            <a href="#members" onclick=newInvite();><i class="fas fa-user-plus"></i> Agregar otro integrante</a>
							<br>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 form-row fieldTeam">
                    <div class="text-left col-12">
                    <label class="titleh4" for="">  Foto del emprendedor o los emprendedores
                    <button type="button" class="border-0 eModal-15">
                        <i class="far fa fa-exclamation-circle"></i>
                    </button> 
                    </label><br/>
                    <span>Una imagen dice mucho. siga estos tips para tener la foto ideal*</span><br/>
                        <label for="file-img" class="mt-2 custom-file-img">
                            <i class="fas fa-link"></i> Adjuntar imagen
                        </label>
                        <input id="file-img" type="file" accept="image/png, .jpeg, .jpg,"/><br/>
                        <span>Formato: JPG o PNG.</span><br/>
						<div id="file-upload-filename"></div>                        
                    </div>
                    </div>
                    <div class="mt-3 categoryForm">
                        <label for="">Elija la categoría en la que su proyecto contribuye:*</label>
                        <div class="mb-3 form-row">
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <button type="button" class="border-0 eModal-10">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </button>
                                    <input id="ctg_saludBienestar" class="form-check-input categoryI" type="checkbox"  name="cat_proyect_saludBienestar" value="' . (isset($_POST['cat_proyect_saludBienestar']) ? isset($_POST['cat_proyect_saludBienestar']) : '') . '">
                                    <label class="form-check-label" for="cat_proyect_saludBienestar">
                                        <i class="icon-heart2"></i>
                                        Salud y bienestar
                                    </label>
                                </div>
                            </div>
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <button type="button" class="border-0 eModal-7">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </button>
                                    <input id="ctg_educacionCalidad" class="form-check-input categoryI" type="checkbox" name="cat_proyect_educacionCalidad"  value="' . (isset($_POST['cat_proyect_educacionCalidad']) ? isset($_POST['cat_proyect_educacionCalidad']) : '') . '">
                                    <label class="form-check-label" for="cat_proyect_educacionCalidad">
                                        <i class="icon-books"></i>
                                        Educación de calidad
                                    </label>
                                </div>
                            </div>
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <button type="button" class="border-0 eModal-8">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </button>
                                    <input id="ctg_inclusionPobreza" class="form-check-input categoryI" type="checkbox" name="cat_proyect_inclusionPobreza"   value="' . (isset($_POST['cat_proyect_inclusionPobreza']) ? isset($_POST['cat_proyect_inclusionPobreza']) : '') . '">
                                    <label class="form-check-label" for="cat_proyect_inclusionPobreza">
                                        <i class="icon-hands"></i>
                                        Inclusión, reducción de desigualdes y pobreza
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-row">
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <button type="button" class="border-0 eModal-6">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </button>
                                    <input id="ctg_transparenciaJ" class="form-check-input categoryI" type="checkbox" name="cat_proyect_transparenciaJ" value="' . (isset($_POST['cat_proyect_transparenciaJ']) ? isset($_POST['cat_proyect_transparenciaJ']) : '') . '">
                                    <label class="form-check-label" for="cat_proyect_transparenciaJ">
                                        <i class="icon-peace"></i>
                                        Transparencia, justicia y cero corrupción
                                    </label>
                                </div>
                            </div>
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <button type="button" class="border-0 eModal-9">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </button>
                                    <input id="ctg_impactoMedio" class="form-check-input categoryI" type="checkbox" name="cat_proyect_impactoMedio"  value="' . (isset($_POST['cat_proyect_impactoMedio']) ? isset($_POST['cat_proyect_impactoMedio'])  : '') . '">
                                    <label class="form-check-label" for="cat_proyect_impactoMedio">
                                        <i class="icon-plant"></i>
                                        Impacto al medio ambiente
                                    </label>
                                </div>
                            </div>
                            <div class="text-center col-4">
                                <div class="form-check radioCategory">
                                    <button type="button" class="border-0 eModal-5">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </button>
                                    <input id="ctg_ciudadesCo" class="form-check-input categoryI" type="checkbox" name="cat_proyect_ciudadesCo"  value="' . (isset($_POST['cat_proyect_ciudadesCo']) ? isset($_POST['cat_proyect_ciudadesCo']) : '') . '">
                                    <label class="form-check-label" for="cat_proyect_ciudadesCo">
                                        <i class="icon-build"></i>
                                        Ciudades y comunidades sostenibles
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 form-row countryProject">
                        <div class="text-left col-12">
                            <label for="countryPro">Indique los países en los que está actualmente implementando el proyecto:*</label>
						
                            <select class="selectpicker" title="Seleccione un país"  multiple aria-label="Default select example" data-live-search="true" " id="id_pais"   >
                                <option data-tokens="colombia">Colombia</option>
                                <option data-tokens="El salvador">El Salvador</option>
                                <option data-tokens="Costa Rica" value="Costa Rica" >Costa Rica</option>
                                <option data-tokens="Panamá" value="Panamá" >Panamá</option>
								 <option data-tokens="Honduras" value="Honduras" >Honduras</option>
                                <option data-tokens="Guatemala" value="Guatemala" >Guatemala</option>
                                <option data-tokens="México" value="México">México</option>
								 <option data-tokens="Nicaragua" value="Nicaragua"  >Nicaragua</option>
								 <option data-tokens="Belice" value="Belice">Belice</option>
								 <option data-tokens="otro" value="otro" >Otro</option>
								 
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 form-row" id="other_country">
                        <div class="text-left col-12">
                            <input id="otherCountry" type="text" placeholder="Digite país proyecto" class="form-control" name="otherCountry"  value="' . (isset($_POST['otherCountry']) ? $otherCountry : null) . '">
                        </div>
                    </div>
                    <div class="mb-3 form-row problemProject">
                        <div class="text-left col-12">
                            <label for="countryPro">¿Qué problemática resuelve el proyecto?*</label>
                            <textarea class="form-control" id="pp"  placeholder="Responde la pregunta con un máximo de 300 palabras"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 form-row soluProject">
                        <div class="text-left col-12">
                            <label for="solution">¿En qué consiste la solución?*</label>
                            <textarea class="form-control" id="sol"  rows="5" placeholder="Describa el proyecto y cómo este aporta a la solución de la problemática. Responde la pregunta con un máximo de 550 palabras"></textarea>
                        </div>
                    </div> 
                    <div class="mb-3 form-row difProject">
                        <div class="text-left col-12">
                            <label for="different">¿En qué se diferencia su solución?*</label>
                            <textarea class="form-control" id="dif"  placeholder="Responde la pregunta con un máximo de 300 palabras"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 form-row videoProject">
                        <h4 class="text-left">El video es una manera de ponerle cara a tu proyecto</h4>
                        <div class="text-left col-12">
                            <label for="different">Ingrese el link de su video publicado en youtube de máximo 3 minutos.*</label>
							   <button type="button"  class="border-0" data-toggle="tooltip" data-placement="bottom" title="Ej:https://www.youtube.com/">
                                <i class="far fa-thumbs-up"></i> Tips para el vídeo ideal
                            </button>
                            <span class="iconsForm playicon"><img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/06/01094310/youtu_icon.svg"></span>
                            <input class="pl-5 ml-1 form-control" id="video3m" type="text" placeholder="Digita la url del video">
             
                        </div>
                        <div class="text-left col-12">
                            <label for="siteProject">Sitio web de proyecto (opcional)</label>
                            <span class="iconsForm"><img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/06/01094301/enla_icon.svg"></span>
                            <input class="pl-5 ml-1 form-control" type="text"  id="miproyecto" placeholder="Ej: www.miproyecto.com">
                        </div>
                        <div class="text-left col-12">
                            <label for="faceProject">Página de Facebook del proyecto (opcional)</label>
                            <span class="iconsForm"><img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/06/01094304/face_icon.svg"></span>
                            <input class="pl-5 ml-1 form-control" type="text" id="facebook" placeholder="Ej: www.facebook.com/miproyecto">
                        </div>
                        <div class="text-left col-12">
                            <label for="insProject">Cuenta de Instagram del proyecto (opcional)</label>
                            <span class="iconsForm"><img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/06/01094307/inst_icon.svg"></span>
                            <input class="pl-5 ml-1 form-control" type="text" id="instagram" placeholder="Ej: @miproyecto">
                        </div>
                    </div>
                    <div class="form-legal">
                        <div class="col">
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" id="check_AceptoT3" >
                                <label class="form-check-label" for="check_AceptoT3">
                                    Acepto los <a target="_blank" href="/comunidad/terminos-y-condiciones" alt="pagina terminos y condiciones">Términos y condiciones</a>, así como también, la <a target="_blank" href="/comunidad/politica-de-privacidad" alt="pagina politica-de-privacidad">Política de privacidad. * </a>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_AceptoP3" >
                                <label class="form-check-label" for="check_AceptoP3">
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
                    </div>
                </div>
                <div class="action-form">
                    <button type="button" id="prevBtn" class="btn bg_orange outline" onclick="nextPrev">Volver</button>
					<div id="btnnext"> 
					<button type="button" id="nextBtn" class="btn bg_orange" onclick="">Continuar</button> 
					 
<input type="submit" name="submit" id="submit" value="Register"  style="display:none;"/>
					</div>
                </div>
            </form>
        </article>
    </div>
</div>
	';
}

function registration_validation($password, $email)
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

    // if (email_exists($email)) {
    //     $reg_errors->add('email', 'El correo ya existe');
    // }
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

function complete_registration()
{
    global $reg_errors, $password, $email, $first_name, $last_name, $country, $city, $date, $born, $type_profile, $bus_dinero, $bus_recibir, $busc_invetirP, $bus_alianza, $busc_voluntP, $busc_networking, $bus_herramien, $bus_mentor, $bus_aportar, $bus_otro, $bus_Nuevo, $ctg_saludBienestar, $ctg_educacionCalidad, $ctg_inclusionPobreza, $ctg_transparenciaJ, $ctg_impactoMedio, $ctg_ciudadesCo, $nameProject, $team, $team1, $team2, $team3, $team4, $team5, $team6, $team7, $team8, $team9, $team10, $otherCountry;

    if (1 > count($reg_errors->get_error_messages())) {
		$user_id = username_exists($email);
		
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
            'team1'                   => $team1,
            'team2'                   => $team2,
            'team3'                   => $team3,
            'team4'                   => $team4,
            'team5'                   => $team5,
            'team6'                   => $team6,
            'team7'                   => $team7,
            'team8'                   => $team8,
            'team9'                   => $team9,
            'team10'                  => $team10,
            'otherCountry'            => $otherCountry

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

    $teamemail1 = $team1;
    $teamemail2 = $team2;
    $teamemail3 = $team3;
    $teamemail4 = $team4;
    $teamemail5 = $team5;
    $teamemail6 = $team6;
    $teamemail7 = $team7;
    $teamemail8 = $team8;
    $teamemail9 = $team9;
    $teamemail10 = $team10;
    $otherCountry = $otherCountry;

    /*EndMails*/
	
	/*Envio de invitacion */
    $sURL    = site_url();
    $emailuser = $email;
    $userpassword = $password;
    $nombre = $first_name;
    $proyecto = $nameProject;
    $teamemail = $team;
	
    $message = '&nbsp; <table style="display: block; background: url("https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/21102046/fondo.png"); background-size: 100%; background-repeat: no-repeat;" border="0" width="650" cellspacing="0" cellpadding="0" align="center">
    <tbody style="display: block;background: url(https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/21102046/fondo.png);background-size:100%; background-repeat: no-repeat;max-width:750px; ">
    <tr style="border-color: transparent !important; border: 0 !important; display: block;">
    <td style="text-align: center; font-size: 13px; color: #000000; line-height: 19px; display: block; margin: 0 auto;" valign="top" width="450">
    <div style="width: 100%; height: auto; margin: 0 auto; padding-top: 1px;">
    <p style="text-align: center; margin-top: 2rem;"><img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/06/23065420/logo_socialSkin.png" alt="logo social skin" height="70" /></p>
    </div>
    <div style="width:450px;background:#fff;height:auto;padding:33px 0px;border-radius: 9px;border-style: solid;border-width: 2px;border-color: #dedede;/* -webkit-box-shadow: 3px 5px 15px 5px rgba(0,0,0,0.31); *//* box-shadow: 3px 5px 15px 5px rgba(0,0,0,0.31); */">
    <span style="padding:0 2em; margin: 0; text-align: center; font-style: normal; font-weight: 500; font-size: 14px; line-height:1; text-align: center; color: #828282; display: block;">
    <p style="text-align: center;"><img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/20101600/checkRegister.png" alt="icono Check" height="105" /></p>
    <span style="padding: 0; margin: 0; text-align: center; font-style: normal; font-weight: 750; font-size: 24px; line-height: 35px; color: #70c149; display: block;">
    ¡Hola!
    </span>
    <p style="line-height: 0; margin: 10px 0; text-align: center;"><img src=" https://d18woz4tua30qj.cloudfront.net/comunidad/wp-content/uploads/2021/07/26203231/rectangulo-mail.png" alt="guion" height="2"></p>
    <span style="text-align: center; font-style: normal; font-weight: 500; font-size: 18px; line-height: 23px; color: #828282; display: block;">
    <strong>' . $nombre . '</strong> te invita a ser parte de la Comunidad Social-Skin con el proyecto <strong style="color: #70c149;">“' . $proyecto . '”</strong>, si quieres ser parte de la Comunidad más grande de emprendimiento de la región deberás registrarte, haciendo click aquí.
    </span>
    <p style=\"text-align: center; margin-top: 2rem;"><a id="boton" style="background: #DE6B2D; border-radius: 5px; color: #ffffff !important; cursor: pointer; padding: .5rem 1rem; text-decoration: none; font-size: 1rem;" href="' . $sURL . '/registro-invitados?email=' . $teamemail . '&nameProject=' . $proyecto . '">Registrame</a></p>                                  
    </span>
    </div></td>
    </tr>
    </tbody>
    </table>
    &nbsp';
	
	  $to = $teamemail;
    $subject = "Invitación a ser parte de la Comunidad Social-Skin";
    $headers = array('Content-Type: text/html; charset=UTF-8');

    $sent = wp_mail($to, $subject, $message, $headers);
    if (!$sent) {
      //  echo $sent;
    }

	
    for ($x = 1; $x <= 10; $x++) {

        /*EndMails*/
        $sURL    = site_url();
        $emailuser = $email;
        $userpassword = $password;
        $nombre = $first_name;
        $proyecto = $nameProject;
        if ($x == 1) {
            $teamemailinv = $team1;
        }
        if ($x == 2) {
            $teamemailinv = $team2;
        }
        if ($x == 3) {
            $teamemailinv = $team3;
        }
        if ($x == 4) {
            $teamemailinv = $team4;
        }
        if ($x == 5) {
            $teamemailinv = $team5;
        }
        if ($x == 6) {
            $teamemailinv = $team6;
        }
        if ($x == 7) {
            $teamemailinv = $team7;
        }
        if ($x == 8) {
            $teamemailinv = $team8;
        }
        if ($x == 9) {
            $teamemailinv = $team9;
        }
        if ($x == 10) {
            $teamemailinv = $team10;
        }
        $message = ' &nbsp;<table style="display: block; background: url("https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/21102046/fondo.png"); background-size: 100%; background-repeat: no-repeat;" border="0" width="650" cellspacing="0" cellpadding="0" align="center">
        <tbody style="display: block;background: url(https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/21102046/fondo.png);background-size:100%; background-repeat: no-repeat;max-width:750px; ">
        <tr style="border-color: transparent !important; border: 0 !important; display: block;">
        <td style="text-align: center; font-size: 13px; color: #000000; line-height: 19px; display: block; margin: 0 auto;" valign="top" width="450">
        <div style="width: 100%; height: auto; margin: 0 auto; padding-top: 1px;">
        <p style="text-align: center; margin-top: 2rem;"><img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/06/23065420/logo_socialSkin.png" alt="logo social skin" height="70" /></p>
        </div>
        <div style="width:450px;background:#fff;height:auto;padding:33px 0px;border-radius: 9px;border-style: solid;border-width: 2px;border-color: #dedede;/* -webkit-box-shadow: 3px 5px 15px 5px rgba(0,0,0,0.31); *//* box-shadow: 3px 5px 15px 5px rgba(0,0,0,0.31); */">
        <span style="padding:0 2em; margin: 0; text-align: center; font-style: normal; font-weight: 500; font-size: 14px; line-height:1; text-align: center; color: #828282; display: block;">
        <p style="text-align: center;"><img src="https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/20101600/checkRegister.png" alt="icono Check" height="105" /></p>
        <span style="padding: 0; margin: 0; text-align: center; font-style: normal; font-weight: 750; font-size: 24px; line-height: 35px; color: #70c149; display: block;">
        ¡Hola!
        </span>
        <p style="line-height: 0; margin: 10px 0; text-align: center;"><img src=" https://d18woz4tua30qj.cloudfront.net/comunidad/wp-content/uploads/2021/07/26203231/rectangulo-mail.png" alt="guion" height="2"></p>
        <span style="text-align: center; font-style: normal; font-weight: 500; font-size: 18px; line-height: 23px; color: #828282; display: block;">
        <strong>' . $nombre . '</strong> te invita a ser parte de la Comunidad Social-Skin con el proyecto <strong style="color: #70c149;">“' . $proyecto . '”</strong>, si quieres ser parte de la Comunidad más grande de emprendimiento de la región deberás registrarte, haciendo click aquí.
        </span>
        <p style=\"text-align: center; margin-top: 2rem;"><a id="boton" style="background: #DE6B2D; border-radius: 5px; color: #ffffff !important; cursor: pointer; padding: .5rem 1rem; text-decoration: none; font-size: 1rem;" href="' . $sURL . '/registro-invitados?email=' . $teamemailinv . '&nameProject=' . $proyecto . '">Registrame</a></p>                                  
        </span>
        </div></td>
        </tr>
        </tbody>
        </table>
        &nbsp';

        $to = $teamemailinv;
        $subject = "Invitación a ser parte de la Comunidad Social-Skin";
        $headers = array('Content-Type: text/html; charset=UTF-8');

        $sent = wp_mail($to, $subject, $message, $headers);
        if (!$sent) {
			//echo 'enivado a'.$teamemailinv;
            // echo $sent;
        }
    }

	
	
/*Bienvenida usuario*/
  
    $mensaje3 = '&nbsp; <table style="display: block; background: url("https://di0sglc4ew7ue.cloudfront.net/comunidad/wp-content/uploads/2021/04/21102046/fondo.png"); background-size: 100%; background-repeat: no-repeat;" border="0" width="650" cellspacing="0" cellpadding="0" align="center">
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
    $to3 = $emailuser;
    $subject3 = "¡Gracias por unirte a Social Skin!";
    $headers3 = array('Content-Type: text/html; charset=UTF-8');

    $sent3 = wp_mail($to3, $subject3, $mensaje3, $headers3);
    if (!$sent3) {
   //     echo $sent2;
    }

    /*Consumo API*/
    $current_user = wp_get_current_user();
    $current_email = $current_user->user_email;
    $current_idS = $current_user->idsocialskin;

    $value = array("idsocialskin" => $current_idS, "email" => $current_email, "password" => $userpassword);
    if (is_array($value) || is_object($value)) {
        $value = json_encode($value);
    }
    $value = (string) $value;
    $salt = openssl_random_pseudo_bytes(256);
    $iv = openssl_random_pseudo_bytes(16);
    $phrase = 'ftHGUKWv6s2iZzXoGary8zPkS5zhzrCcyN7';
    $iterations = 999;
    $key = hash_pbkdf2("sha512", $phrase, $salt, $iterations, 64);
    $encrypted_data = openssl_encrypt($value, 'aes-256-ctr', hex2bin($key), OPENSSL_RAW_DATA, $iv);
    $data = array("value" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "salt" => bin2hex($salt));
    $nelemento = base64_encode(json_encode($data));

    $data = $nelemento;
    echo '<script>
setTimeout(() => { 
		 $("#emodal-overlay").show();
        $("#emodal-overlay").css({ background: "rgba(0, 0, 0, 0.62)" });
        $("#eModal-2").show();}, 1000);
		
		
  </script>';
}

function custom_registration_function()
{
    if (isset($_POST['submit'])) {
        registration_validation(
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
            $_POST['team'],
            isset($_POST['team1']),
            isset($_POST['team2']),
            isset($_POST['team3']),
            isset($_POST['team4']),
            isset($_POST['team5']),
            isset($_POST['team6']),
            isset($_POST['team7']),
            isset($_POST['team8']),
            isset($_POST['team9']),
            isset($_POST['team10']),
            isset($_POST['otherCountry'])

            //$_POST['check_AceptoT'],
            //$_POST['check_AceptoP'],
            //$_POST['check_autoriz'],

        );

        // sanitize user form input
        global $password, $email, $first_name, $last_name, $country, $city, $date, $born, $type_profile, $bus_recibir, $busc_invetirP, $bus_dinero,  $busc_voluntP, $bus_alianza, $busc_networking, $bus_herramien, $bus_mentor, $bus_aportar, $bus_otro, $bus_Nuevo, $ctg_saludBienestar, $ctg_educacionCalidad, $ctg_inclusionPobreza, $ctg_transparenciaJ, $ctg_impactoMedio, $ctg_ciudadesCo, $nameProject, $team, $team1, $team2, $team3, $team4, $team5, $team6, $team7, $team8, $team9, $team10, $otherCountry;
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
        $nameProject          = sanitize_text_field($_POST['nameProject']);
        $team                 = sanitize_text_field($_POST['team']);
        $team1                 = sanitize_text_field(isset($_POST['team1']) ? $_POST['team1'] : null );
        $team2                 = sanitize_text_field(isset($_POST['team2']) ?  $_POST['team2']  : null );
        $team3                 = sanitize_text_field(isset($_POST['team3']) ?  $_POST['team3']  : null );
        $team4                 = sanitize_text_field(isset($_POST['team4']) ?  $_POST['team4']  : null );
        $team5                 = sanitize_text_field(isset($_POST['team5']) ?  $_POST['team5']  : null );
        $team6                 = sanitize_text_field(isset($_POST['team6']) ?  $_POST['team6']  : null );
        $team7                 = sanitize_text_field(isset($_POST['team7']) ?  $_POST['team7']  : null );
        $team8                 = sanitize_text_field(isset($_POST['team8']) ?  $_POST['team8']  : null );
        $team9                 = sanitize_text_field(isset($_POST['team9']) ?  $_POST['team9']  : null );
        $team10                 = sanitize_text_field(isset($_POST['team10']) ?  $_POST['team10']  : null );
        $otherCountry       = sanitize_text_field(isset($_POST['otherCountry']));


        //$check_AceptoT        = esc_textarea($_POST['check_AceptoT']);
        //$check_AceptoP        = esc_textarea($_POST['check_AceptoP']);
        //$check_autoriz        = esc_textarea($_POST['check_autoriz']);
        //user posted variables


        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
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

    registration_form(
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
        isset($team1),
        isset($team2),
        isset($team3),
        isset($team4),
        isset($team5),
        isset($team6),
        isset($team7),
        isset($team8),
        isset($team9),
        isset($team10),
        isset($otherCountry),
        //$check_AceptoT,
        //$check_AceptoP,
        //$check_autoriz,
    );
}


// Register a new shortcode: [cr_custom_registration]
add_shortcode('cr_custom_registration', 'custom_registration_shortcode_reg');

// The callback function that will replace [book]
function custom_registration_shortcode_reg()
{
    ob_start();
   // sendemnail();
    custom_registration_function();
    return ob_get_clean();
}