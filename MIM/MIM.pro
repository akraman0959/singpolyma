######################################################################
# Automatically generated by qmake (2.01a) Wed Jan 10 15:22:04 2007
######################################################################

TEMPLATE = app
TARGET = 
DEPENDPATH += .
INCLUDEPATH += .

# Input
HEADERS += addresswindowimpl.h \
           databasewindow.h \
           mailinglabelsimpl.h \
           mainwindowimpl.h \
           sxwplaindriver.h \
           sqlimportwindow.h
#           importxmlhandler.h
FORMS += addresswindow.ui mailinglabels.ui mainwindow.ui
SOURCES += addresswindowimpl.cpp \
           databasewindow.cpp \
           mailinglabelsimpl.cpp \
           main.cpp \
           mainwindowimpl.cpp \
           sxwplaindriver.cpp \
           sqlimportwindow.cpp
#           importxmlhandler.cpp

QT += sql
# QT += xml
RESOURCES = resources/MIM.qrc
