/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


Ext.define('Packt.view.Login',{
    extend:'Ext.window.Window',
    alias: 'widget.login',
    autoShow: true,
    height: 170,
    width: 360,
    layout:{
        type: 'fit'
    },
    iconCls: 'Key',
    title: "Login",
    closeAction: 'hide',
    closable: false,
 
 
 
    items: [
{
    xtype: 'form', // #12
    frame: false, // #13
    bodyPadding: 15, // #14
    defaults: { // #15
    xtype: 'textfield', // #16
        anchor: '100%', // #17
        labelWidth: 60 // #18
    },
    items: [
    {
        name: 'user',
        fieldLabel: "User"
    },
    {
        inputType: 'password', // #19   
        name: 'password',
        fieldLabel: "Password"
    }
    ]
    }
    ]




    Ext.apply(Ext.form.field.VTypes, {
customPass: function(val, field) {
return /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})/.
test(val);
},
customPassText: 'Not a valid password. Length must be at least
6 characters and maximum of 20Password must contain one digit, one
letter lowercase, one letter uppercase, onse special symbol @#$% and
between 6 and 20 characters.',
});



dockedItems: [
{
xtype: 'toolbar',
dock: 'bottom',
items: [
{
xtype: 'tbfill' //#24
},
{
xtype: 'button', // #25
itemId: 'cancel',
iconCls: 'cancel',
text: 'Cancel'
},
{
xtype: 'button', // #26
itemId: 'submit',
formBind: true, // #27
iconCls: 'key-go',
text: "Submit"
}
]
}
]









});