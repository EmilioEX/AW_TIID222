#Importamos la libreria de flask
from flask import Flask, redirect, render_template, request, url_for

#Importar la librería de MYSQL para Flask
from flask_mysqldb import MySQL

#Importamos librerías para generar un hash y para comprobar que el hash coincida con la contraseña
from werkzeug.security import generate_password_hash, check_password_hash

#Creamos unas instancia del proyecto
app = Flask(__name__)

#Permite cargar las vistas cuando se modifican
app.config["TEMPLATES_AUTO_RELOAD"]=True

#Configuracion de la conexion
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'flasktiid'
app.secret_key = 'mysecretkey'

mysql = MySQL(app)

#Creamos nuestra ruta de registro
@app.route("/")
def home():
    return render_template("login.html")


# REGISTRO DE USUARIOS
@app.route("/registro", methods=["GET", "POST"])
def registro():

    if request.method == "POST":

        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password = request.form["password"]
        id_rol = request.form["id_rol"]

        # Generar el hash de la contraseña
        password_hash = generate_password_hash(password)

        cursor = mysql.connection.cursor()

        #Comprobar si el correo ya existe
        cursor.execute(
            "SELECT id FROM usuarios WHERE correo = %s",
            (correo,)
        )

        if cursor.fetchone():
            cursor.close()
            return render_template ("registro.html")

        #Insertar el usuario a la base de datos
        cursor.execute(
          """INSERT INT usuario
           (nombre, apellid_p, apellido_m, correo, password, id_rol)
           VALUES (%s, %s, %s, %s, %s, %s)
           """, (
               nombre,
               apellido_p,
               apellido_m,
               correo,
               password_hash,
               id_rol
           )  
        )
    cursor.close()
    return redirect(url_for("home"))

#Ejecutar el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port=5000)