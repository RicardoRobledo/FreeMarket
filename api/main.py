from flask import Flask, render_template, request, redirect, url_for, session


app = Flask(__name__, template_folder='templates')

@app.route('/')
def home():
    return 'Hello'