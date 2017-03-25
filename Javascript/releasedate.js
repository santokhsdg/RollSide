    function check()
    {
        var flag =0 ;
        var day = parseInt($('#days').val());
        var month = parseInt($('#months').val());
        var year = parseInt($('#years').val());
        var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];
        if(year%400==0||(year%100!=0&&year%4==0))
            {
                monthLength[1]=29;
            }
        var today, someday;
        var text = "*Release Date is Invalid";
today = new Date();
someday = new Date();
someday.setFullYear(year, month-1, day);

if (someday > today) {
    flag=1;
} 
    if(day > monthLength[month-1])
        {
            flag=1;
        }
        if (flag==1)
            {
                document.getElementById("labels").innerHTML = text;
                return false;
            }
        else
            {
                return true;
            }
        
        
        return false;
        
    }
    
    
    

