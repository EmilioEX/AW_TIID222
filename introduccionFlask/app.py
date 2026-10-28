#Importamos librería de flask
from flask import Flask,render_template, redirect, request, url_for

#Importamos la librería de MySQL para flask
from flask_mysqldb import MySQL

#Importamos librerias para generar un hash y para comprobar que el hash coincida con la contraseña
from werkzeug.security import generate_password_hash, check_password_hash

#Creamos unas instancias del proyecto
app= Flask(__name__)

#Permite cargar las vistas cuando se modifican
app.config["TEMPLATES_AUTO_RELOAD"]=True

#Configuración de la conexión
app.config['MYSQL_HOST']= 'localhost'
app.config['MYSQL_USER']= 'root'
app.config['MYSQL_PASSWORD']= ''
app.config['MYSQL_DB']= 'dbflask'
app.secret_key='mysecretkey'
mysql=MySQL(app)
#Creamos rutas
@app.route("/")
#funcion que se llama home
def home():
    #retornar mensaje
    return render_template("login.html")

#Creamos ruta de registro
@app.route("/register", methods=["GET", "POST"])
def register():

    if request.method == "POST":

        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password = request.form["password"]
        id_rol = request.form["id_rol"]

        password_hash = generate_password_hash(password)

        cursor = mysql.connection.cursor()

        cursor.execute(
            "SELECT id FROM usuarios WHERE correo = %s",
            (correo,)
        )

        if cursor.fetchone():
            cursor.close()
            return render_template("register.html")

        cursor.execute(
            """
            INSERT INTO usuarios
            (nombre, apellido_p, apellido_m,
             correo, password_hash, id_rol)
            VALUES (%s, %s, %s, %s, %s, %s)
            """,
            (
                nombre,
                apellido_p,
                apellido_m,
                correo,
                password_hash,
                id_rol
            )
        )

        mysql.connection.commit()
        cursor.close()

        return redirect(url_for("home"))

    return render_template("register.html")

#Ejecutamos el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port=5000)