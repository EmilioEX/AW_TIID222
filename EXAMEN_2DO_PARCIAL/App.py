from flask import Flask, render_template,request,url_for, flash, redirect
from flask_mysqldb import MySQL

app=Flask(__name__)

app.config["TEMPLATES_AUTO_RELOAD"]=True

app.config["MYSQL_HOST"]='localhost'
app.config["MYSQL_USER"]='root'
app.config["MYSQL_PASSWORD"]=''
app.config["MYSQL_DB"]='crud_calificaciones'

app.secret_key='mysecretkey'

mysql=MySQL(app)

#Rutas
@app.route('/')
def index():
    con=mysql.connection.cursor()
    con.execute('SELECT * from tb_calificaciones')
    conCalificaciones=con.fetchall()
    print(conCalificaciones)
    return render_template('index.html', listCalificaciones=conCalificaciones)

@app.route('/guardar', methods=['POST'])
def guardar():
    if request.method=='POST':
        nombreAlumno=request.form['nombreAlumno']
        matricula=request.form['matricula']
        nombreMateria=request.form['nombreMateria']
        calificacion=request.form['calificacion']
        print(nombreAlumno, matricula, nombreMateria)
        con = mysql.connection.cursor()
        con.execute('INSERT INTO tb_calificaciones(nombreAlumno, matricula, nombreMateria, calificacion) VALUES (%s,%s,%s,%s)', (nombreAlumno, matricula, nombreMateria,calificacion))
        mysql.connection.commit()

    flash('La calificacion fue agregada correctamente!')
    return redirect(url_for('index'))


@app.route('/editar/<int:matricula>')
def editar(matricula):
    con=mysql.connection.cursor()
    con.execute('SELECT * from tb_calificaciones where matricula=%s', (matricula,))
    consultarMatricula=con.fetchone()
    con.close()
    return render_template('editar.html', Calificacion=consultarMatricula)

@app.route('/actualizar/<int:matricula>', methods=['POST'])
def actualizar(matricula):
    if request.method=='POST':
        nombreAlumno=request.form['nombreAlumno']
        nombreMateria=request.form['nombreMateria']
        calificacion=request.form['calificacion']
        
        con=mysql.connection.cursor()
        con.execute('update tb_calificaciones set nombreAlumno=%s, nombreMateria=%s, calificacion=%s where matricula=%s', (nombreAlumno, nombreMateria,calificacion, matricula))
        mysql.connection.commit()

    flash('Se actualizaron los datos de '+nombreAlumno)
    return redirect(url_for('index'))

@app.route('/eliminar/<int:matricula>', methods=['POST'])
def eliminar(matricula):
    if request.method=='POST':
        nombreAlumno=request.form['nombreAlumno']
        
        con=mysql.connection.cursor()
        con.execute('delete from tb_calificaciones where matricula=%s', (matricula,))
        mysql.connection.commit()

    flash('Se eliminaron los datos de '+nombreAlumno)
    return redirect(url_for('index'))



if __name__ == '__main__':
    app.run(debug=True)

