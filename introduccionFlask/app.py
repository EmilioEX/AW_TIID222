#Importamos librería de flask
from flask import Flask,render_template, redirect

#Creamos unas instancias del proyecto
app= Flask("__name__")

app.config["TEMPLATES_AUTO_RELOAD"]=True

#Creamos rutas
@app.route("/")
#funcion que se llama home
def home():
    #retornar mensaje
    return render_template("index.html")

@app.route("/guardar")
def guardar():
    return "Producto agregado exitosamente"

@app.route("/login")
def login():
    return render_template("login.html")

@app.route("/logout")
def logout():
    return redirect("/login")

#Ejecutamos el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port=5000)