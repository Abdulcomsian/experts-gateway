function selectCountry(country_code){
        if($('#countryId').find('option[countryid="'+country_code+'"]').length > 0){
            $('#countryId').find('option[countryid="'+country_code+'"]').attr("selected",true);
            $('#countryId').val($('#countryId').find('option[countryid="'+country_code+'"]').attr('value'));
        } else {
            $('#countryId').val('');
        }
        if($('#stateId').length > 0){
            $('#countryId').trigger('change');
        }
    }
    

    function updatePhoneInputValue(){
        if($('#phone').val()){                
            $('#phone_submit').val($('#phone').intlTelInput('getNumber').replace("+", ""))
        }else{
            $('#phone_submit').val('');
        }
    }

    $(function(){
        var phoneinput;
        initIntlTelInput();
        $(document).on('change', '#phone', function(){
            updatePhoneInputValue();
        });
        var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
        function initIntlTelInput(){
            phoneinput  =  $("#phone").intlTelInput({
                separateDialCode: true,
                initialDialCode: true,
                excludeCountries: ['as'],
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.0/js/utils.js" // just for formatting/placeholders etc
            });
            $('#phone_submit').val(($('#phone_submit').val()).replace(/\b0+/g, ''));
            $("#phone").intlTelInput('setNumber', $('#phone_submit').val() ? "+" + $('#phone_submit').val() : $('#phone_submit').val());
            if ($('#phone_submit').val()){
                selected_country_code  = ($("#phone").intlTelInput('getSelectedCountryData').iso2).toUpperCase();
                selectCountry(selected_country_code)
                checkinput();
            }
        }
        if(Object.keys($("#phone").intlTelInput('getSelectedCountryData')).length === 0){
            initIntlTelInput();
        } else {
            selected_country_code  = ($("#phone").intlTelInput('getSelectedCountryData').iso2).toUpperCase();
        }
        var initCountry = setInterval(() => {
            if($('#countryId option').length > 1 && selected_country_code != undefined){
                selectCountry(selected_country_code)
                clearInterval(initCountry)
            }
        }, 1000)

        phoneinput.on('countrychange', function (e, countryData) {                       
            selected_country_code  = ($("#phone").intlTelInput('getSelectedCountryData').iso2).toUpperCase();
            selectCountry(selected_country_code);
            updatePhoneInputValue();
        });        

        $("#phone").on('keyup',  checkinput);
        function checkinput() {
          console.log($("#phone").intlTelInput('isValidNumber'));
          if ($("#phone").val().trim()) {
            if (!$("#phone").intlTelInput('isValidNumber')) {
              $("#phone").addClass("error");
              var errorCode = $("#phone").intlTelInput('getValidationError');
              console.log(errorCode);
              if(errorMap[errorCode] === undefined){
                  errorCode = 0; // for all the unknown error show Invalid error text as errror message
              }
              var errHTML   = '<span id="error-msg" class="hide error bold">'+errorMap[errorCode]+'</span>';
              $("#phone").parents('.form-group').find('#error-msg').remove();
              $("#phone").parents('.form-group').append(errHTML);
              $("#error-msg").removeClass("hide");
            } else {
                $("#phone").removeClass("error");
                $("#error-msg").remove();
                $("#valid-msg").addClass("hide");
            }
          }
        }        
    });