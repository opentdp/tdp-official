FROM rehiy/webox:nginx-php8

LABEL version="0.2.0" \
      maintainer="wang@rehiy.com"

ADD . /ifs
RUN sh /ifs/deploy

ENTRYPOINT ["/sbin/init"]

EXPOSE 80 443
