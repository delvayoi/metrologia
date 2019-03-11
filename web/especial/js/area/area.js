/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Ext.ns('MyAppEspecial');


function cargarVariables(){
    url="Sistema/DocumentacionBundle/Entity/area.php";
}


//cxreamos el modelo
Ext.define('ModeloProductoGeneral',{
    extend:'Ext.data.Model',
    fields:("id","area"),
    idProperty:'id'
});
//cargmos el listado
var almacen=Ext.create('Ext.data.Store',{
    model:'ModeloProductoGeneral',
    pageSize : 15,
    proxy:{
        type: 'ajax',
        url:'area',
        
    }

});
//cargams el prodcuto\n\
var grip=Ext.create('Ext.grip.Panel',{
   width: 550,
   height: 550,
   loadMask: true,
   title:'Gestion',
   store: almacen,
   columns: [{
           text:  "id",
           dataIndex: 'id' ,
           width: 250,
               align: 'LEFT',
               sortable : true,
   }, {
            text:"area",
           dataIndex: 'area',
           width:250,
               align:'LEFT',
               sortable : true,
           
   }],

   
});