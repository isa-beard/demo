//氏名
$('input[name="name"]').on('blur', function(){

    let name = $('input[name="name"]').val();

	var reg = new RegExp(/[!"#$%&'()\*\+\-\.,\/:;<=>?@\[\\\]^_`{|}~]/g);

	if(name.match(/\d/) || name.match(reg)){

        $(".error__name").text("使用できない文字列が使われています");
        $(".error__name").css("color","red");
        $(".fname").css("background-color","#FDD");
        //ボタンクリックイベントを失敗とさせる
        //return false
        //e.preventDefault();

	} else if(name.match(/^\s/)) {

        $(".error__name").text("頭文字に空白を入れないでください");
        $(".error__name").css("color","red");
        $(".fname").css("background-color","#FDD");
	} else {

        if(name == ''){

            $(".error__name").text("必須入力項目です");
            $(".error__name").css("color","red");
            $(".fname").css("background-color","#FDD");

        } else {

            $('input[name="name"]').next('.error__name').remove();
            $(".fname").css("background-color","#7fffbf");
        

        }
    }
});



$('input[name="address"]').on('blur', function(){

    let address = $('input[name="address"]').val();


    if(address == '') {

        $(".error__address").text("必須入力項目です");
        $(".error__address").css("color","red");
        $(".faddress").css("background-color","#FDD");
        
    } else {

        $('input[name="address"]').next('.error__address').remove();
        $(".faddress").css("background-color","#7fffbf");
    }
});

$('input[name="aodamo"]').on('blur', function(){

    let aodamo = $('input[name="aodamo"]').val();
    let momizi = $('input[name="momizi"]').val();

    if(momizi == '' && aodamo == ''){

        $(".error__cart").text("どちらかをご購入ください");
        $(".error__cart").css("color","red");
        $(".fcart").css("background-color","#FDD");

    }else{

        $('input[name="aodamo"]').next('.error__name').remove();
        $('input[name="momizi"]').next('.error__name').remove();
        $(".fcart").css("background-color","#7fffbf");
  
    }

});

$('input[name="momizi"]').on('blur', function(){

    let aodamo = $('input[name="aodamo"]').val();
    let momizi = $('input[name="momizi"]').val();

    if(momizi == '' && aodamo == ''){

        $(".error__cart").text("どちらかをご購入ください");
        $(".error__cart").css("color","red");
        $(".fcart").css("background-color","#FDD");

    }else{

        $('input[name="aodamo"]').next('.error__name').remove();
        $('input[name="momizi"]').next('.error__name').remove();
        $(".fcart").css("background-color","#7fffbf");
  
    }

});


$('#button').on('click', function() {

    let name = $('input[name="name"]').val();
    let address = $('input[name="address"]').val();
    let aodamo = $('input[name="aodamo"]').val();
    let momizi = $('input[name="momizi"]').val();
    
    //氏名
    $('input[name="name"]').on('blur', function(e){


        var reg = new RegExp(/[!"#$%&'()\*\+\-\.,\/:;<=>?@\[\\\]^_`{|}~]/g);

        if(name.match(/\d/) || name.match(reg)){

            $(".error__name").text("使用できない文字列が使われています");
            $(".error__name").css("color","red");
            $(".fname").css("background-color","#FDD");
            e.preventDefault();

        } else if(name.match(/^\s/)) {

            $(".error__name").text("頭文字に空白を入れないでください");
            $(".error__name").css("color","red");
            $(".fname").css("background-color","#FDD");
            e.preventDefault();

        } else {

            if(name == ''){

                $(".error__name").text("必須入力項目です");
                $(".error__name").css("color","red");
                $(".fname").css("background-color","#FDD");
                e.preventDefault();

            } else {

                $('input[name="name"]').next('.error__name').remove();
                $(".fname").css("background-color","#7fffbf");

                $('input[name="address"]').on('blur', function(){
                
                
                    if(address == '') {
                
                        $(".error__address").text("必須入力項目です");
                        $(".error__address").css("color","red");
                        $(".faddress").css("background-color","#FDD");
                        e.preventDefault();
                        
                    } else {
                
                        $('input[name="address"]').next('.error__address').remove();
                        $(".faddress").css("background-color","#7fffbf");

                        $('input[name="aodamo"]').on('blur', function(){

                            let aodamo = $('input[name="aodamo"]').val();
                            let momizi = $('input[name="momizi"]').val();
                        
                            if(momizi == '' && aodamo == ''){
                        
                                $(".error__cart").text("どちらかをご購入ください");
                                $(".error__cart").css("color","red");
                                $(".fcart").css("background-color","#FDD");
                        
                            }else{
                        
                                $('input[name="aodamo"]').next('.error__name').remove();
                                $('input[name="momizi"]').next('.error__name').remove();
                                $(".fcart").css("background-color","#7fffbf");

                                $('input[name="momizi"]').on('blur', function(){

                                    let aodamo = $('input[name="aodamo"]').val();
                                    let momizi = $('input[name="momizi"]').val();
                                
                                    if(momizi == '' && aodamo == ''){
                                
                                        $(".error__cart").text("どちらかをご購入ください");
                                        $(".error__cart").css("color","red");
                                        $(".fcart").css("background-color","#FDD");
                                
                                    }else{
                                
                                        $('input[name="aodamo"]').next('.error__name').remove();
                                        $('input[name="momizi"]').next('.error__name').remove();
                                        $(".fcart").css("background-color","#7fffbf");
                                        alert('お買い上げありがとうございます！');
                                        return true;
                                  
                                    }
                                
                                });
                          
                            }
                        
                        });
                        

                       
                    }

                });
            

            }
        }
    });
   
    
});