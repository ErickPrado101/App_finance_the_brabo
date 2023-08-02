const express = require('express');
const mysql= require('mysql12/promise');
const app = express();
const port = 3000;

app.set('view engine', 'ejs');

app.use(express.urlencoded({extended: true}));
const vonnection = mysql.creatConnection({
    host:'localhost',
    user:'my_user',
    password:'senha',
    database:'finalncial_app_db'
})
app.get('/', async (req, res)=> {
    const [rows] = await connection.query('SELECT* FROM transaction');
    res.render('index',{trasaction:rows});
});
app.post('/transactions', async(req,res)=> {
    const {description, amout}= req.body;
    await connection.query('INSERT INTP trasaction (user_id,descrion')
})