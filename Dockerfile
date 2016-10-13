FROM quay.io/travisci/travis-php
MAINTAINER Sam Leathers <sam@appliedtrust.com>
RUN mkdir -p /home/travis/brewblogger
VOLUME /home/travis/brewblogger
ADD run.sh /run.sh
EXPOSE 8000
CMD ["su","-","travis","-c","/run.sh"]
