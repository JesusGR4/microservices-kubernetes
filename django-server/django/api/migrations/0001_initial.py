# Generated by Django 2.2.6 on 2019-10-21 22:43

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Tweet',
            fields=[
                ('id_tweet', models.AutoField(primary_key=True, serialize=False)),
                ('id_user', models.IntegerField()),
                ('content', models.CharField(max_length=140)),
            ],
        ),
    ]
