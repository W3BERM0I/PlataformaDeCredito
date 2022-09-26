# estágio de compilação
FROM node:lts-alpine as build-stage
WORKDIR /app
ENV PATH /app/node_modules/.bin:$PATH
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# estágio de produção
FROM nginx:stable-alpine as production-stage
COPY --from=build-stage /app/dist /usr/share/nginx/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]


-----------------------------------


FROM node:lts-alpine

RUN npm install -g http-server

RUN mkdir /app

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build

EXPOSE 80

CMD [ "http-server", "dist" ]

-----------------------------

# build stage
FROM node:lts-alpine as build-stage
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# production stage
FROM nginx:stable-alpine as production-stage
COPY --from=build-stage /app/dist /usr/share/nginx/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]

---------------------------------------

FROM node:lts-alpine

RUN npm install -g http-server

RUN npm install -g @vue/cli

RUN mkdir /app

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build

EXPOSE 8080

CMD [ "http-server", "dist" ]

-------------------------- docker-compose ----------------------------

version: '3.7'

services:
  web:
    build:
      context: ./
      dockerfile: Dockerfile

    stdin_open: true
    tty: true
    environment:
      - HOST=0.0.0.0
      - CHOKIDAR_USEPOLLING=true

    volumes:
      - ~/.composer-docker/cache:/root/.composer/cache:delegated
      - ./:/usr/src/app:cached
    ports:
      - "8080:8080"

-----------------------------------
version: '3.7'

services:
  app:
    build: .
    volumes:
      - .:/app
    working_dir: /app
    ports:
      - 8080:8080
