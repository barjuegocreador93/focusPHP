function isJQ(html,html2)
{
	return $(html).is(html2);
}
function isReady(html)
{	
	return isJQ(html,":visible");	
}
function ob(activ,slave,nactiv,cactiv,nslave)
{
  
   {
   $(activ).click(function(){
              for(var x=1;isReady(nactiv+x+"")||isJQ(nactiv+x+"",":not(:visible)");x++)
              {
                  if ((nactiv + x + "") !== cactiv) {
                    $(nactiv + x + "").fadeIn();
                    $(nslave + x + "").slideUp();
                }
              }
              $(slave).slideDown();
              $(this).hide();
              $(activ+"_on").slideDown();
              $(activ+"_off").slideUp();
              
   });
   if(isJQ(activ,".activ_on"))$(activ).click();
   if(isJQ(activ,".getText"))
   {
       for(var i=1;i<=6;i++)
       {
           if(isJQ(slave,".h_"+i+""))
           {
               $(slave).prepend("<h"+i+">"+$(activ).text()+"</h"+i+">");
           }
       }
   }
   
   
   }
   return;
   
}
function fast_appi(activ,slave)
{
    this.activ=activ;
    this.slave=slave;    
    this.run=function()
    {
       var nactiv="."+this.activ;
       var nslave="."+this.slave;
       
      for(var i=1;isReady("."+this.activ+i+"")||isJQ("."+this.activ+i+"",":not(:visible)");i++)
      {
          
          var cactiv="."+this.activ+i+"";
          var cslave="."+this.slave+i+"";
          $(cslave).hide();
          ob(cactiv,cslave,nactiv,cactiv,nslave);   
          
      }
    };
}