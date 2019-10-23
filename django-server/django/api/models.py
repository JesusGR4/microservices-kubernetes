# -*- coding: utf-8 -*-
from django.db import models

class Tweet(models.Model):
    id_tweet = models.AutoField(primary_key=True)
    id_user = models.IntegerField()
    content = models.CharField(max_length=140)

    def __str__(self):
        return self.content