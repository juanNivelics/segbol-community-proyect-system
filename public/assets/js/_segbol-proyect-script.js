//This lines, is for to blocked values diferents to 2021 in date input
//
//
/*Validador de correo*/

const entradacorreo = document.getElementById("email01");

if (entradacorreo) {
  entradacorreo.addEventListener("change", updateValue);
}

function updateValue(e) {
  jQuery.ajax({
    url: d_vars.ajaxurl,
    type: "post",
    data: {
      action: "validar_usuario",
      usuario: e.target.value,
    },
    success: function (resultado) {
      if (resultado != "") {
        document.getElementById("nextBtn").setAttribute("disabled", "disabled");
        document.getElementById("response").innerHTML = "";
        valid = false;
        jQuery("#emodal-overlay").show();
        jQuery("#emodal-overlay").css({ background: "rgba(0, 0, 0, 0.62)" });
        jQuery("#eModal-13").show();
      } else {
        document.getElementById("nextBtn").removeAttribute("disabled");
      }
    },
  });
}
/***/
/*
 Codigo Juan Carlos 
 */
jQuery.datepicker.regional["es"] = {
  closeText: "Cerrar",
  prevText: "< Ant",
  nextText: "Sig >",
  currentText: "Hoy",
  monthNames: [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
  ],
  monthNamesShort: [
    "Ene",
    "Feb",
    "Mar",
    "Abr",
    "May",
    "Jun",
    "Jul",
    "Ago",
    "Sep",
    "Oct",
    "Nov",
    "Dic",
  ],
  dayNames: [
    "Domingo",
    "Lunes",
    "Martes",
    "Miércoles",
    "Jueves",
    "Viernes",
    "Sábado",
  ],
  dayNamesShort: ["Dom", "Lun", "Mar", "Mié", "Juv", "Vie", "Sáb"],
  dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
  weekHeader: "Sm",
  dateFormat: "dd/mm/yy",
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: "",
};
jQuery.datepicker.setDefaults(jQuery.datepicker.regional["es"]);
jQuery(function () {
  jQuery("#date").datepicker({
    changeMonth: false,
    changeYear: true,
    dateFormat: "dd/mm/yy",
    minDate: new Date("1920-01-01"),
    maxDate: new Date("2007-12-31"),
  });
  if (document.querySelector("#date")) {
    jQuery("#date").mask("##/##/####", {
      placeholder: "DD/MM/AAAA",
      reverse: true,
    });
    document.querySelector("#date").addEventListener("keydown", function (e) {
      e.preventDefault();
    });
  }
});

const stepRegisterForm = document.getElementById("register");
if (stepRegisterForm) {
  const fileInput = document.getElementById("file-img");

  var infoArea = document.getElementById("file-upload-filename");
  if (fileInput) {
    fileInput.addEventListener("change", showFileName);

    function showFileName(event) {
      var input = event.srcElement;

      var fileName = input.files[0].name;
      infoArea.textContent = "Nombre de tu imagen: " + fileName;
    }

    //alerta campo imagen
    function testingLoad(string, id, color) {
      const errorElementFile = document.createElement("span");
      errorElementFile.setAttribute("style", `color:jQuery{color}`);
      errorElementFile.setAttribute("id", `alertjQuery{id.id}`);
      let texto = document.createTextNode(`jQuery{string}`);
      errorElementFile.appendChild(texto);
      if (!document.querySelector(`#alertjQuery{id.id}`)) {
        id.parentNode.insertBefore(errorElementFile, id.nextSibling);
      }
    }

    //validador campo imagen formulario

    const validateTestImage = (id) => {
      if (id.value === "") {
        testingLoad("El archivo no puede quedar vacio ✕", fileInput, "red");
        return false;
      } else {
        if (!id.value.endsWith("jpeg") && !id.value.endsWith("png")) {
          console.log("no es el formato");
          testingLoad("No es un formato valido ✕", fileInput, "red");
          return false;
        } else {
          return false;
        }
      }
    };

    //validador campo imagen tiempo real

    fileInput.addEventListener("change", (event) => {
      if (document.getElementById(`alertjQuery{fileInput.id}`)) {
        document.getElementById(`alertjQuery{fileInput.id}`).remove();
      }
      let files = event.target.files;

      Object.values(files).forEach((file) => {
        let { type } = file;
        if (type.startsWith("image/")) {
          if (!type.endsWith("jpeg") && !type.endsWith("png")) {
            testingLoad("Formato de imagen incorrecto ✕", fileInput, "red");
          } else {
            testingLoad("Correcto ✔", fileInput, "green");
          }
        } else {
          testingLoad("El archivo no es una imagen ✕", fileInput, "red");
        }
      });
    });

    //focus
    const v3Focus = document.getElementById("video3m"),
      miproyectoFocus = document.getElementById("miproyecto"),
      facebookFocus = document.getElementById("facebook"),
      instagramFocus = document.getElementById("instagram");
    v3Focus.addEventListener("change", () => {
      clearAlert(v3Focus);
    });
    miproyectoFocus.addEventListener("change", () => {
      clearAlert(miproyectoFocus);
    });
    facebookFocus.addEventListener("change", () => {
      clearAlert(facebookFocus);
    });
    instagramFocus.addEventListener("change", () => {
      clearAlert(instagramFocus);
    });

    function clearAlert(id) {
      if (document.getElementById(`alertjQuery{id.id}`)) {
        document.getElementById(`alertjQuery{id.id}`).remove();
      }
    }
  }

  /*End codigo juan carlos*/
  count = 0;

  var dateControler = {
    currentDate: null,
  };
  jQuery('input[type="checkbox"]').on("change", function () {
    jQuery('input[name="' + this.name + '"]')
      .not(this)
      .prop("checked", false);
  });

  if (stepRegisterForm) {
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
  }
  function newInvite() {
    count += 1;
    jQuery(
      '<div id="idobjeto" ><div><input type="email" class="form-control" placeholder="Ej: correo@micorreo.com" name="team' +
        count +
        '" id="team' +
        count +
        '" value=\'\' required><button onclick="delInput(idobjeto)">x</button></div><label id="responset' +
        count +
        '"></label></div> <br>'
    ).appendTo("#members");
  }

  function delInput(id) {
    document.getElementById("idobjeto").remove();

    count = count - 1;
  }

  function myRol() {
    var ele = document.getElementsByName("type_profile");
    for (i = 0; i < ele.length; i++) {
      if (ele[i].checked) {
        if (ele[i].value != "profile_emprendedor") {
          document.getElementById("nextBtn").innerHTML = "Registrarse";
          document.getElementById("form-legal").style.display = "block";
        } else {
          document.getElementById("nextBtn").innerHTML = "Continuar";
          document.getElementById("form-legal").style.display = "none";
        }
      }
    }
  }
  if (stepRegisterForm) {
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
  }
  function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    var profileCheck = document.getElementById("profile_emprendedor");
    if (profileCheck) {
      var profile = document.getElementById("profile_emprendedor").checked;
    }

    // console.log(x);
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n === 0) {
      document.querySelector("#prevBtn").style.display = "none";
    } else {
      document.querySelector("#prevBtn").style.display = "inline";
    }

    var ele = document.getElementsByName("type_profile");
    for (i = 0; i < ele.length; i++) {
      if (ele[i].checked) {
        if (ele[i].value != "profile_emprendedor") {
          if (n === 1) {
            document.getElementById("nextBtn").innerHTML = "Registrarse";
          }
        }
      }
    }

    switch (profile) {
      case true:
        document.getElementById("nextBtn").innerHTML = "Registrarse";
        break;
      case false:
        document.getElementById("nextBtn").innerHTML = "Continuar";
        break;
      default:
        document.getElementById("nextBtn").innerHTML = "Continuar";
    }

    if (n === x.length - 1) {
      document.getElementById("nextBtn").innerHTML = "Registrarse";
    } else {
      document.getElementById("nextBtn").innerHTML = "Continuar";
    }

    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n);
  }

  function enviar() {
    document.getElementById("regForm").submit();
    return false;
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var tabform = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n === 1 && !validateForm()) {
      var nprjval = document.getElementsByName("nameProject").value;
      var nteam = document.getElementsByName("team").value;
      if (nprjval == "" || nteam == "") {
        document.getElementsByName("nameProject").value = "null";
        document.getElementsByName("team").value = "null";
      }
      jQuery("#eModal-11").show();
      jQuery("a.emodal-close").hide();
      jQuery("#emodal-overlay").show();
      jQuery("#emodal-overlay").css({ background: "rgba(0, 0, 0, 0.52)" });
      jQuery("#seccionD").scrollTop();
      jQuery(function () {
        jQuery("#closeM").click(function () {
          jQuery("#eModal-11").modal().hide();
          jQuery("#emodal-overlay").css({ display: "none" });
        });
      });
      return false;
    }

    // Hide the current tab:
    tabform[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    var ele = document.getElementsByName("type_profile");
    var button = document.getElementById("nextBtn").innerHTML;

    for (i = 0; i < ele.length; i++) {
      if (ele[i].checked) {
        if (ele[i].value != "profile_emprendedor" && button == "Registrarse") {
          currentTab = currentTab + n + 1;
        }
      }
    } //  console.log( currentTab +'_'+'_'+tabform.length);

    if (currentTab >= tabform.length) {
      //...the form gets submitted:
      jQuery("#submit").click();

      jQuery("#eModal-2").show();
      jQuery("a.emodal-close").hide();
      jQuery("#emodal-overlay").show();
      jQuery("#emodal-overlay").css({ background: "rgba(0, 0, 0, 0.52)" });
      jQuery("#seccionD").scrollTop();

      jQuery(function () {
        jQuery("#closeM").click(function () {
          jQuery("#eModal-2").modal().hide();
          jQuery("#emodal-overlay").css({ display: "none" });
        });
      });

      // document.getElementById("regForm").submit();

      return false;
    }
    // Otherwise, display the correct tab:
    jQuery("#seccionD").scrollTop();
    if (stepRegisterForm) {
      showTab(currentTab);
    }
  }

  function validamail(email) {
    var RegExPattern =
      /(^[0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}jQuery/;
    return RegExPattern.test(email);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    var tabForm,
      tabActual,
      i,
      valid = true;
    tabForm = document.getElementsByClassName("tab");
    tabActual = tabForm[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:

    if (currentTab == 0) {
      /**/

      /**/

      var fname = document.getElementsByName("fname").value;
      var lname = document.getElementsByName("lname").value;
      var country = document.getElementsByName("country").value;
      var city = document.getElementsByName("city").value;
      var password = document.getElementsByName("password").value;
      var date = document.getElementById("date").value;
      if (
        fname == "" ||
        lname == "" ||
        country == "" ||
        city == "" ||
        password == "" ||
        date == ""
      ) {
        valid = false;
      }
      var correovalidar = document.getElementById("email01").value;
      if (document.getElementById("email01").value != "") {
        if (!validamail(jQuery("#email01").val())) {
          document.getElementById("response").innerHTML =
            "<strong style ='color:red;'> El campo correo debe tener @</strong>";
          valid = false;
        } else {
          document.getElementById("response").innerHTML = "";
        }
      }

      /* for (i = 0; i < tabActual.length; i++) {
			   if (tabActual[i].value === "") {
				   tabActual[i].className += " invalid";
					  if(tabActual.length ===8){
				  if (tabActual[i].name != 'born') {
				valid = false;
			}
			}
		  }
		  }*/
    }
    /*inicio if*/
    if (currentTab == 1) {
      var button = document.getElementById("nextBtn").innerHTML;
      var tc = document.getElementById("check_AceptoT");
      var tp = document.getElementById("check_AceptoP");
      var busc_invetirP = document.getElementById("busc_invetirP").checked;
      var busc_voluntP = document.getElementById("busc_voluntP").checked;
      var busc_networking = document.getElementById("busc_networking").checked;
      var bus_herramien = document.getElementById("bus_herramien").checked;
      var bus_mentor = document.getElementById("bus_mentor").checked;
      var bus_aportar = document.getElementById("bus_aportar").checked;
      var bus_dinero = document.getElementById("bus_dinero").checked;
      var bus_recibir = document.getElementById("bus_recibir").checked;
      var bus_alianza = document.getElementById("bus_alianza").checked;
      var ctg_saludBienestar =
        document.getElementById("ctg_saludBienestar").checked;
      var ctg_educacionCalidad = document.getElementById(
        "ctg_educacionCalidad"
      ).checked;
      var ctg_inclusionPobreza = document.getElementById(
        "ctg_inclusionPobreza"
      ).checked;
      var ctg_transparenciaJ =
        document.getElementById("ctg_transparenciaJ").checked;
      var ctg_impactoMedio =
        document.getElementById("ctg_impactoMedio").checked;
      var bus_otro = document.getElementById("bus_otro").checked;
      var ctg_ciudadesCo = document.getElementById("ctg_ciudadesCo").checked;

      if (
        busc_invetirP === false &&
        busc_voluntP === false &&
        busc_networking === false &&
        bus_herramien === false &&
        bus_mentor === false &&
        bus_aportar === false &&
        bus_dinero === false &&
        bus_recibir === false &&
        bus_alianza === false
      ) {
        valid = false;
      } else if (
        ctg_saludBienestar === false &&
        ctg_educacionCalidad === false &&
        ctg_inclusionPobreza === false &&
        ctg_transparenciaJ === false &&
        ctg_impactoMedio === false &&
        ctg_ciudadesCo === false
      ) {
        valid = false;
      }

      if (bus_otro == true) {
        var nuevo = document.getElementById("bus_Nuevo");
        if (nuevo.value != "") {
          valid = true;
        } else {
          valid = false;
        }
      } else if (tc.checked === false || tp.checked === false) {
        if (button === "Continuar") {
          if (
            busc_invetirP === false &&
            busc_voluntP === false &&
            busc_networking === false &&
            bus_herramien === false &&
            bus_mentor === false &&
            bus_aportar === false &&
            bus_dinero === false &&
            bus_recibir === false &&
            bus_alianza === false
          ) {
            valid = false;
          } else if (
            ctg_saludBienestar === false &&
            ctg_educacionCalidad === false &&
            ctg_inclusionPobreza === false &&
            ctg_transparenciaJ === false &&
            ctg_impactoMedio === false &&
            ctg_ciudadesCo === false
          ) {
            valid = false;
          } else if (bus_otro == true) {
            var nuevo = document.getElementById("bus_Nuevo");
            if (nuevo.value != "") {
              valid = true;
            } else {
              valid = false;
            }
          } else {
            valid = true;
          }
        } else {
          valid = false;
          console.log("ingrese tc y tp");
        }
      }
    }
    /*Fin if*/
    if (currentTab == 2) {
      if (document.getElementById("team").value != "") {
        if (!validamail(jQuery("#team").val())) {
          console.log(jQuery("#team").val());
          document.getElementById("responset").innerHTML =
            "<strong style ='color:red;'> El campo correo debe tener @</strong>";
          valid = false;
        } else {
          document.getElementById("responset").innerHTML = "";
        }
      }

      for (i = 0; i < count; i++) {
        switch (i) {
          case 0:
            correteam = "team1";
            idcorreteam = "#team1";
            label = "responset1";
            break;
          case 1:
            correteam = "team2";
            idcorreteam = "#team2";
            label = "responset2";
            break;
          case 2:
            correteam = "team3";
            idcorreteam = "#team3";
            label = "responset3";
            break;
          case 3:
            correteam = "team4";
            idcorreteam = "#team4";
            label = "responset4";
            break;
          case 4:
            correteam = "team5";
            idcorreteam = "#team5";
            label = "responset5";
            break;
          case 5:
            correteam = "team6";
            idcorreteam = "#team6";
            label = "responset6";
            break;
          case 6:
            correteam = "team7";
            idcorreteam = "#team7";
            label = "responset7";
            break;
          case 7:
            correteam = "team8";
            idcorreteam = "#team8";
            label = "responset8";
            break;
          case 8:
            correteam = "team9";
            idcorreteam = "#team9";
            label = "responset9";
            break;
          case 9:
            correteam = "team10";
            idcorreteam = "#team10";
            label = "responset10";
            break;
        }

        if (correteam != "") {
          if (!validamail(jQuery(idcorreteam).val())) {
            document.getElementById(label).innerHTML =
              "<strong style ='color:red;margin-top: -7%;'> El campo correo debe tener @</strong>";
            valid = false;
          } else {
            document.getElementById(label).innerHTML = "";
          }
        }
      }

      var tc = document.getElementById("check_AceptoT3").checked;
      var tp = document.getElementById("check_AceptoP3").checked;
      var np = document.getElementById("nameProject");
      var cb = document.getElementById("ctg_saludBienestar");
      var pa = document.getElementById("id_pais");
      var pp = document.getElementById("pp");
      var sol = document.getElementById("sol");
      var dif = document.getElementById("dif");
      var img = document.getElementById("file-img");
      var v3 = document.getElementById("video3m");
      var miproyecto = document.getElementById("miproyecto");
      var facebook = document.getElementById("facebook");
      var instagram = document.getElementById("instagram");

      if (
        tc === false ||
        tp === false ||
        np.value == "" ||
        cb.value == "" ||
        pa.value == "" ||
        pp.value == "" ||
        sol.value == "" ||
        dif.value == "" ||
        img.value == ""
      ) {
        valid = false;
      }
      if (!valideMaxWordsTextarea(pp.value, 300)) {
        testingLoad("el numero de palabras supera lo permitido ✕", pp, "red");
        valid = false;
      }
      if (!valideMaxWordsTextarea(sol.value, 550)) {
        testingLoad("el numero de palabras supera lo permitido ✕", sol, "red");
        valid = false;
      }
      if (!valideMaxWordsTextarea(dif.value, 300)) {
        testingLoad("el numero de palabras supera lo permitido ✕", sol, "red");
        valid = false;
      }
      if (
        !img.value.endsWith("jpeg") &&
        !img.value.endsWith("png") &&
        !img.value.endsWith("jpg")
      ) {
        valid = false;
      }

      if (v3.value == "" || !validURL(v3.value)) {
        valid = false;
        testingLoad("Este campos es obligatorio y debe ser una URL", v3, "red");
      }
      if (miproyecto.value != "") {
        if (!validURL(miproyecto.value)) {
          valid = false;
          testingLoad("Debe ser una URL", miproyecto, "red");
        }
      }
      if (facebook.value != "") {
        if (!validURL(facebook.value)) {
          valid = false;
          testingLoad("Debe ser una URL", facebook, "red");
        }
      }
      if (instagram.value != "") {
        if (!validURL(instagram.value)) {
          valid = false;
          testingLoad("Debe ser una URL", instagram, "red");
        }
      }
    }

    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className +=
        " finish";
    }

    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i,
      x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
  }

  document.getElementById("nextBtn").addEventListener("click", () => {
    nextPrev(1);
  });
  document.getElementById("prevBtn").addEventListener("click", () => {
    nextPrev(-1);
  });

  function checkCheckBoxes(theForm) {
    if (
      theForm.busc_invetirP.checked == false &&
      theForm.busc_voluntP.checked == false &&
      theForm.busc_networking.checked == false &&
      theForm.bus_herramien.checked == false &&
      theForm.bus_mentor.checked == false &&
      theForm.bus_aportar.checked == false &&
      theForm.bus_otro.checked == false &&
      theForm.bus_alianza.checked == false &&
      theForm.bus_dinero.checked == false &&
      theForm.bus_recibir.checked == false &&
      theForm.bus_Nuevo.checked == false
    ) {
      jQuery("a.emodal-close").hide();
      jQuery("#eModal-11").show();
      jQuery("#emodal-overlay").show();
      jQuery("#emodal-overlay").css({ background: "rgba(0, 0, 0, 0.52)" });
      jQuery("#seccionD").scrollTop();
      jQuery(function () {
        jQuery("#closeM").click(function () {
          jQuery("#eModal-11").modal().hide();
          jQuery("#emodal-overlay").css({ display: "none" });
        });
      });
      return false;
    }
    if (
      theForm.ctg_saludBienestar.checked == false &&
      theForm.ctg_educacionCalidad.checked == false &&
      theForm.ctg_inclusionPobreza.checked == false &&
      theForm.ctg_transparenciaJ.checked == false &&
      theForm.ctg_impactoMedio.checked == false &&
      theForm.ctg_ciudadesCo.checked == false
    ) {
      document.getElementById("slectDos").style.display = "block";
      return false;
    } else {
      return true;
    }
  }

  //habilita input al seleccionar check de otro - categoria
  function comprobar() {
    document.getElementById("bus_Nuevo").readOnly =
      !document.getElementById("bus_otro").checked;
  }

  var input = document.getElementById("nameProject");
  if (input) {
    input.addEventListener("input", function () {
      if (this.value.length > 81) this.value = this.value.slice(0, 81);
    });
  }

  function validURL(str) {
    var pattern = new RegExp(
      "^(https?:\\/\\/)?" + // protocol
        "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" + // domain name
        "((\\d{1,3}\\.){3}\\d{1,3}))" + // OR ip (v4) address
        "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // port and path
        "(\\?[;&a-z\\d%_.~+=-]*)?" + // query string
        "(\\#[-a-z\\d_]*)?jQuery",
      "i"
    ); // fragment locator
    return !!pattern.test(str);
  }
}
//traido desde custom
jQuery(document).ready(function () {
  /*open share article*/
  jQuery(".toggle-nav").click(function () {
    jQuery(".nav-wrap").toggleClass("open");
  });
});
if (document.querySelector("#pp")) {
  document.querySelector("#pp").addEventListener("keydown", function (e) {
    let max = valideMaxWordsTextarea(e.target.value, 300);

    if (!max) {
      testingLoad(
        "el numero de palabras supera lo permitido ✕",
        e.target,
        "red"
      );
    } else {
      clearAlert(e.target);
    }
  });
}
if (document.querySelector("#sol")) {
  //#sol = 550
  document.querySelector("#sol").addEventListener("keydown", function (e) {
    let max = valideMaxWordsTextarea(e.target.value, 550);

    if (!max) {
      testingLoad(
        "el numero de palabras supera lo permitido ✕",
        e.target,
        "red"
      );
    } else {
      clearAlert(e.target);
    }
  });
}
if (document.querySelector("#dif")) {
  document.querySelector("#dif").addEventListener("keydown", function (e) {
    let max = valideMaxWordsTextarea(e.target.value, 300);
    if (!max) {
      testingLoad(
        "el numero de palabras supera lo permitido ✕",
        e.target,
        "red"
      );
    } else {
      clearAlert(e.target);
    }
  });
}

/*Paises opcion otro */
jQuery(document).ready(function () {
  jQuery("#other_country").hide();
  jQuery("#id_pais").on("change", function () {
    jQuery("#id_pais option:selected").each(function () {
      if (this.value == "otro") {
        jQuery("#other_country").show();
      } else {
        jQuery("#other_country").hide();
      }
    });
  });
});

function permite(elEvento, permitidos) {
  // Variables que definen los caracteres permitidos
  var numeros = "0123456789";
  var caracteres =
    " aábcdeéfghiíjklmnñoópqrstuvwxyzAÁBCDEÉFGHIÍJKLMNÑOÓPQRSTUVWXYZ";
  var numeros_caracteres = numeros + caracteres;
  var teclas_especiales = [8, 37, 39, 46];
  // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha

  // Seleccionar los caracteres a partir del parámetro de la función
  switch (permitidos) {
    case "num":
      permitidos = numeros;
      break;
    case "car":
      permitidos = caracteres;
      break;
    case "num_car":
      permitidos = numeros_caracteres;
      break;
  }

  // Obtener la tecla pulsada
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);

  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for (var i in teclas_especiales) {
    if (codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}

//max Words textarea form register
function valideMaxWordsTextarea(strProm, numMaxWords) {
  var isValide = true;
  strProm = strProm.replace(/\s\s+/g, " ");
  if (strProm.split(" ").length > numMaxWords) {
    isValide = false;
  }
  return isValide;
}
