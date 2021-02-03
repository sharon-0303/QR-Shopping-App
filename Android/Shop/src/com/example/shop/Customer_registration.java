package com.example.shop;

import org.ksoap2.SoapEnvelope;
import org.ksoap2.serialization.SoapObject;
import org.ksoap2.serialization.SoapSerializationEnvelope;
import org.ksoap2.transport.HttpTransportSE;

import android.os.Build;
import android.os.Bundle;
import android.os.StrictMode;
import android.annotation.TargetApi;
import android.app.Activity;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Customer_registration extends Activity {
	EditText ed1,ed2,ed3,ed4,ed5,ed6,ed7,ed8;
	Button b1,b2;
	

	String namespace="urn:demo";
	String method="register";
	String soapaction="urn:demo/register";
	
    @TargetApi(Build.VERSION_CODES.GINGERBREAD) @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customer_registration);
        ed1=(EditText)findViewById(R.id.editText1);
        ed2=(EditText)findViewById(R.id.editText2);
        ed3=(EditText)findViewById(R.id.editText3);
        ed4=(EditText)findViewById(R.id.editText4);
        ed5=(EditText)findViewById(R.id.editText5);
        ed6=(EditText)findViewById(R.id.editText6);
        ed7=(EditText)findViewById(R.id.editText7);
        ed8=(EditText)findViewById(R.id.editText8);
        b1=(Button)findViewById(R.id.button1);
        b2=(Button)findViewById(R.id.button2);
        

		try
		{
			if(android.os.Build.VERSION.SDK_INT>9)
			{
				StrictMode.ThreadPolicy policy=new StrictMode.ThreadPolicy.Builder().permitAll().build();
				StrictMode.setThreadPolicy(policy);
			}
		}
		catch(Exception e)
		{
			
		}
		
        
      b1.setOnClickListener(new View.OnClickListener() {
		
		@Override
		public void onClick(View arg0) {
			// TODO Auto-generated method stub
			String name=ed1.getText().toString();
			String sname=ed2.getText().toString();
			String place=ed3.getText().toString();
			String email=ed4.getText().toString();
			String phone=ed5.getText().toString();
			String uname=ed6.getText().toString();
			String pword=ed7.getText().toString();
			String cpword=ed8.getText().toString();
			int flag=0;
			
			if(name.equals("")){
				ed1.setError("Enter name");
				ed1.setFocusable(true);
			flag++;	
			}
			if(sname.equals("")){
				ed1.setError("Enter sname");
				ed1.setFocusable(true);
				flag++;
			}
			if(place.equals("")){
				ed1.setError("Enter place");
				ed1.setFocusable(true);
			flag++;	
			}
			if(!android.util.Patterns.EMAIL_ADDRESS.matcher(email).matches()){
				ed1.setError("Enter valid email");
				ed1.setFocusable(true);
			}
			if(!android.util.Patterns.PHONE.matcher(phone).matches()){
				ed2.setError("Enter valid phone number");
				ed2.setFocusable(true);
			}
			if(uname.equals("")){
				ed1.setError("Enter uname");
				ed1.setFocusable(true);
			flag++;	
			}
			if(pword.equals("")){
				ed1.setError("Enter pword");
				ed1.setFocusable(true);
			flag++;	
			}
			if(cpword.equals("")){
				ed1.setError("Enter cpword");
				ed1.setFocusable(true);
			flag++;	
			}
			if(flag==0){
			try
			{
				SoapObject sop=new SoapObject(namespace,method);
				
				sop.addProperty("fname", name);
				sop.addProperty("sname",sname);
				sop.addProperty("place", place);
				sop.addProperty("email", email);
				sop.addProperty("phone", phone);
				sop.addProperty("uname", uname);
				sop.addProperty("pword", pword);
				sop.addProperty("cpword", cpword);
				
				SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
				sev.setOutputSoapObject(sop);
				
				HttpTransportSE htp=new HttpTransportSE(Login.url);
				htp.call(soapaction, sev);
				
				String res=sev.getResponse().toString();
				Toast.makeText(getApplicationContext(), res, Toast.LENGTH_LONG).show();
			}
			catch(Exception e)
			{
				Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();
			}
			}
			
			
		}
	});
      b2.setOnClickListener(new View.OnClickListener() {
		
		@Override
		public void onClick(View arg0) {
			// TODO Auto-generated method stub
			
		}
	});
    }


   
    
}
