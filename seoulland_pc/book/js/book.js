  $(document).ready(function () {

      document.getElementById('date').value = new Date().toISOString().substring(0, 10);
      

      var count1 = 0;
      var fare1 = 46000;
      var cfare1 = 0;
        var count2 = 0;
      var fare2 = 43000;
      var cfare2 = 0;
       var count3 = 0;
      var fare3 = 40000;
      var cfare3 = 0;

     
          
          $('.age1 input[type=button]').click(function(){
              if($(this).hasClass('p')) {
                count1 += 1;
                 cfare1 = fare1 * count1;
                 
                    
              } else {
                if(count1>0){  
                  count1 -= 1
                
                  cfare1 = fare1 * count1;
                }
              } 
              
            
              
              $('#count1').val(count1);
              $('#cfare1').val(cfare1);
             $('.total_fare p').eq(0).html('성인 ' + count1 + ' 인' + '<span>'  + cfare1 +' 원 </span>' );
              
              if(count1==0) {
                  $('.total_fare p').eq(0).text("");
              }
              
              $('#total').val(cfare1+cfare2+cfare3);
            
          });
              
              
               $('.age2 input[type=button]').click(function(){
              if($(this).hasClass('p')) {
                count2 += 1;
                 cfare2 = fare2 * count2;
                 
                    
              } else {
                 if(count2>0){    
                   count2 -= 1
                
                  cfare2 = fare2 * count2;
                 }
              } 
              
               
                   
                   $('#count2').val(count2);
                   $('#cfare2').val(cfare2);
              $('.total_fare p').eq(1).html('청소년 ' + count2 + ' 인' + '<span>'  + cfare2+' 원 </span>' );
                   
                    if(count2==0) {
                  $('.total_fare p').eq(1).text("");
              }
              
                   $('#total').val(cfare1+cfare2+cfare3);
          });
          
      
      
       $('.age3 input[type=button]').click(function(){
              if($(this).hasClass('p')) {
                count3 += 1;
                 cfare3 = fare3 * count3;
                 
                    
              } else {
                 if(count3>0){  
                   count3 -= 1
                
                  cfare3 = fare3 * count3;
                 }
              } 
              
                
                   
                   $('#count3').val(count3);
                   $('#cfare3').val(cfare3);
               $('.total_fare p').eq(2).html('어린이 ' + count3 + ' 인' + '<span>'  + cfare3 +' 원 </span>' );
           
            if(count3==0) {
                  $('.total_fare p').eq(2).text("");
              }
              
           
           $('#total').val(cfare1+cfare2+cfare3);
          });
         
      
    
            
      });
      

      


      
