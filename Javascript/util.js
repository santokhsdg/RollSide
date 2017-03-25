function CheckWordLimit(qr,len)
{  
    var res = qr.split(" ");
    for(var i=0;i<res.length;i++)
        { 
           if(res[i].length>len)
               {
                   return 0;
               }
        }
    return 1;
}