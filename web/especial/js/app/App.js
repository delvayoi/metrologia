/* 
libro :Packtpub.MASTERING.EXT.JS.2013
 */
Ext.application({
    name:'Packt',
    views:[
        'Main',
        'Viewport'
    ],
    controllers:[
        'Main'
    ],
    autoCreateViemport:true    
    
}); 
Ext.application
({
   init: function() 
   {
       splashscreen = Ext.getBody().mask('Loading application','splashscreen');
   }
 
}); 
    
    
    
    
    