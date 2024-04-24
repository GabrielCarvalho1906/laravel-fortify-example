# -*- coding: utf-8 -*-

from playwright.sync_api import sync_playwright
from PIL import Image

def run():
    with sync_playwright() as p:
        browser = p.chromium.launch()
        context = browser.new_context()
        page = context.new_page()

        # Abre o site
        page.goto("https://app.honeybadger.io/")

        # Preenche o campo de e-mail
        page.fill('//*[@id="user_email"]', 'jcamera@estracta.com')

        # Preenche o campo de senha
        page.fill('//*[@id="user_password"]', 'WnsR@NWnB6cuZc3')

        # Clica no botão de login
        page.click('//*[@id="new_user"]/div[3]/div/input')

        # Espera um pouco para permitir o redirecionamento ou carregamento da próxima página
        page.wait_for_timeout(5000)

        # Captura o HTML da página de destino após o login (opcional)
        logged_in_html = page.content()

        # Tirar uma captura de tela após o login e salvar como imagem
        screenshot_path_after_login = '/home/ggabriel/login10/laravel-fortify-example/public/images/honeybadger.png'
        page.screenshot(path=screenshot_path_after_login)

        # Fechar o navegador
        browser.close()

if __name__ == "__main__":
    run()
